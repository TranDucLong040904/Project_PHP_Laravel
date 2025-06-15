<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\LichChieu;
use App\Models\TheLoai;
use Carbon\Carbon;

class PhimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phims = Movie::with('theloai')->where('status', 0)->get();   
        return view('admin.phim.index', compact('phims'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $theloais = TheLoai::all(); // Lấy tất cả thể loại  
        return view('admin.phim.create', compact('theloais'));
    }

    public function edit($id)
    {
        // Tìm phim theo ID
        $movie = Movie::findOrFail($id);  // Nếu không tìm thấy sẽ trả lỗi 404
        // Lấy tất cả thể loại
        $categories = TheLoai::all();
        
        // Trả về view chỉnh sửa với thông tin phim và danh sách thể loại
        return view('admin.phim.edit', compact('movie', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          

        $request->validate([  
            'TENPHIM' => 'required|unique:phim,TENPHIM|max:255',  
            'POSTER' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
            'NAMPH' => 'required|date|after:' . now(),  
            'status' => 'required|in:Đang chiếu,Ngừng chiếu',  
        ], [  
            'NAMPH.after' => 'Thời gian lịch khởi chiếu phải sau thời điểm hiện tại.',  
        ]); 

        $statusValue = ($request->status === 'Active') ? 1 : 0;

        $phim = new Movie();  
        $phim->TENPHIM = $request->TENPHIM;  
        $phim->IDTHELOAI = $request->IDTHELOAI;  
        


        if ($request->hasFile('POSTER')) {  
            $file = $request->file('POSTER');  
            $filename = time() . '.' . $file->getClientOriginalExtension();  
            $file->move(public_path('images'), $filename);  
            $phim->POSTER = $filename;  
        }  

        $phim->THOILUONG = $request->THOILUONG;  
        $phim->DAODIEN = $request->DAODIEN;  
        $phim->NAMPH = $request->NAMPH;  
        $phim->DESCRIP = $request->DESCRIP;  
        $phim->DIENVIEN = $request->DIENVIEN;  
        $phim->status = $statusValue;  

        $phim->save(); // Lưu vào cơ sở dữ liệu  

        \Log::info('Phim đã thêm thành công:', ['id' => $phim->id]); // Ghi lại id của phim mới đã thêm  

        return redirect()->route('phim.index')->with('success', 'Phim đã được thêm thành công!');  
    
        return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra, vui lòng thử lại.']);  
    
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $phims = Movie::with('theloai')->where('status', 1)->get();   
        return view('admin.phim.show', compact('phims'));
        
    }


    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'TENPHIM' => 'required|unique:phim,TENPHIM,' . $id . ',IDPHIM|max:255', // Kiểm tra tên phim trùng
            'NAMPH' => 'required',  
            'POSTER' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra định dạng ảnh
            'status' => 'required|in:Đang chiếu,Ngừng chiếu', // Kiểm tra trạng thái phim
        ]);

        $statusValue = ($request->status === 'Đang chiếu') ? 0 : 1;

        // Tìm phim cần sửa
        $phim = Movie::findOrFail($id);

        // Cập nhật thông tin phim
        $phim->TENPHIM = $request->TENPHIM;
        $phim->IDTHELOAI = $request->IDTHELOAI;

        // Kiểm tra xem có file ảnh poster mới không
        if ($request->hasFile('POSTER')) {
            // Xóa ảnh cũ nếu có
            if ($phim->POSTER) {
                $oldImagePath = public_path('images') . '/' . $phim->POSTER;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Xóa ảnh cũ
                }
            }

            // Lưu ảnh mới
            $file = $request->file('POSTER');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $phim->POSTER = $filename;
        }

        // Cập nhật các thông tin khác
        $phim->THOILUONG = $request->THOILUONG;
        $phim->DAODIEN = $request->DAODIEN;
        $phim->NAMPH = $request->NAMPH;
        $phim->DESCRIP = $request->DESCRIP;
        $phim->DIENVIEN = $request->DIENVIEN;
        $phim->status = $statusValue;

        // Lưu thông tin phim đã sửa
        $phim->save();

        \Log::info('Phim đã sửa thành công:', ['id' => $phim->IDPHIM]); // Log thông tin phim

        // Redirect về trang danh sách phim và thông báo thành công
        return redirect()->route('phim.index')->with('success', 'Phim đã được sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phims = Movie::find($id);  
    
        // Kiểm tra xem phim có còn lịch chiếu nào không  
        // $lichChieuCount = LichChieu::where('IDPHIM', $id)->count();  
        
        // Kiểm tra xem có lịch chiếu nào sau ngày hiện tại không  
        $lichChieuCountAfterNow = LichChieu::where('IDPHIM', $id)  
            ->where('XUATCHIEU', '>', Carbon::now())  
            ->count();  

        if ($lichChieuCountAfterNow > 0) {  
            return redirect()->back()->with('error', 'Không thể xóa phim vì vẫn còn lịch chiếu sau ngày hiện tại.');  
        }  
        
          
        $phims->status = 1;  
        $phims->save();  

        return redirect()->back()->with('success', 'Phim đã được xóa.'); 
    }

    public function kichHoat(string $id)
    {
        $phims = Movie::find($id);  
        $phims->status = 0; // Đặt trạng thái thành 0  
        $phims->save();  

        return redirect()->back()->with('success', 'Phim đã được kích hoạt.'); 
    }
}
