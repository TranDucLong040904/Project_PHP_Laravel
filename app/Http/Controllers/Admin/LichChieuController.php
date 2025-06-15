<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LichChieu;
use App\Models\Movie;
use App\Models\PhongChieu;
use App\Models\TrangThaiGhe;
use Carbon\Carbon; 

class LichChieuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = LichChieu::with(['movie', 'room'])->where('status', 0);

        // Lọc theo ID phim nếu được chọn
        if ($request->has('movie_id') && $request->movie_id != '') {
            $query->where('IDPHIM', $request->movie_id);
        }

        // Lọc theo trạng thái
        if ($request->has('filter_status') && $request->filter_status == 'not_yet') {
            $query->where('XUATCHIEU', '>', now()); // Lấy lịch chiếu chưa diễn ra
        }

        $lichChieus = $query->get();

        // Thêm số ghế có sẵn vào từng lịch chiếu
        foreach ($lichChieus as $lichChieu) {
            $lichChieu->available_seats_count = TrangThaiGhe::where('IDLICHCHIEU', $lichChieu->IDLICHCHIEU)
                ->where('STATUS', 0)
                ->count();
        }

        // Lấy danh sách tất cả phim để hiển thị trong dropdown
        $movies = Movie::where('status', 0)->get();

        // Trả dữ liệu về view
        return view('admin.lichchieu.index', compact('lichChieus', 'movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    //thêm lại vào git
    public function create()
    {
        $movies = Movie::where('status', 0)->get(); 
        $rooms = PhongChieu::where('status', 0)->get();

        return view('admin.lichchieu.create', compact('movies', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */

     //thêm vào git
    public function store(Request $request)  
    {  
        $request->validate([  
            'IDPHIM' => 'required|exists:phim,IDPHIM',  
            'XUATCHIEU' => 'required|date|after:' . now(),  
            'IDPHONGCHIEU' => 'required|exists:phongchieu,IDPHONGCHIEU',  
            'status' => 'required|boolean',  
        ], [  
            'XUATCHIEU.after' => 'Thời gian xuất chiếu phải sau thời điểm hiện tại.',  
        ]); 

 
        $existingLichChieu = LichChieu::where('IDPHONGCHIEU', $request->IDPHONGCHIEU)  
        ->where('XUATCHIEU', $request->XUATCHIEU)  
        ->first();  


        if ($existingLichChieu) {  
            return back()->withErrors(['XUATCHIEU' => 'Lịch chiếu này đã tồn tại tại phòng chiếu này vào thời gian này.']);  
        }


        $currentDateTime = now();  
        $xuatChieuTime = Carbon::parse($request->XUATCHIEU);

        $conflictLichChieu = LichChieu::where('IDPHONGCHIEU', $request->IDPHONGCHIEU)  
            ->where(function ($query) use ($xuatChieuTime) {  
                $query->whereBetween('XUATCHIEU', [  
                    $xuatChieuTime->copy()->subHours(5),   
                    $xuatChieuTime->copy()->addHours(5)
                ]);  
            })  
            ->first();  

        if ($conflictLichChieu) {  
            return back()->withErrors(['XUATCHIEU' => 'Xuất chiếu phải cách xa các lịch chiếu khác ít nhất 5 giờ.']);  
        }  
        // Tạo ID tự động  
        $lastLichChieu = LichChieu::orderBy('IDLICHCHIEU', 'desc')->first();  
        
        if ($lastLichChieu) {  
            $newId = 'LC' . str_pad(substr($lastLichChieu->IDLICHCHIEU, 2) + 1, 3, '0', STR_PAD_LEFT);  
        } else {  
            $newId = 'LC001';  
        }  

        // Đảm bảo ID không bị trùng  
        while (LichChieu::where('IDLICHCHIEU', $newId)->exists()) {  
            $newId = 'LC' . str_pad(substr($newId, 2) + 1, 3, '0', STR_PAD_LEFT);  
        }  

        // Lưu lịch chiếu mới  
        $lichChieu = new LichChieu();  
        $lichChieu->IDLICHCHIEU = $newId;  
        $lichChieu->IDPHIM = $request->IDPHIM;  
        $lichChieu->XUATCHIEU = $request->XUATCHIEU;  
        $lichChieu->IDPHONGCHIEU = $request->IDPHONGCHIEU;  
        $lichChieu->status = $request->status;  
        $lichChieu->save();  

        // Chuyển hướng với thông báo thành công  
        return redirect()->route('lichchieu.index')->with('success', 'Lịch chiếu được thêm thành công!');  
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        
        $lichChieus = LichChieu::with(['movie', 'room'])
            ->where('status', 1)
            ->get();

        // Trả dữ liệu về view
        return view('admin.lichchieu.show', compact('lichChieus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hasSoldSeats = TrangThaiGhe::where('IDLICHCHIEU', $id)  
            ->where('STATUS', '=', 1) // Kiểm tra STATUS = 1  
            ->exists(); // Kiểm tra sự tồn tại  

        if ($hasSoldSeats) {  
            return redirect()->back()->with('error', 'Không thể xóa lịch chiếu vì đã có ghế được bán.');  
        }
        $lichChieu = LichChieu::findOrFail($id);

        // Lấy danh sách phim và phòng chiếu để hiển thị trong dropdown
        $movies = Movie::where('status', 0)->get();
        $rooms = PhongChieu::where('status', 0)->get();

        // Trả về view edit với dữ liệu
        return view('admin.lichchieu.edit', compact('lichChieu', 'movies', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([  
            'IDPHIM' => 'required|exists:phim,IDPHIM',  
            'XUATCHIEU' => 'required|date|after:' . now(),  
            'IDPHONGCHIEU' => 'required|exists:phongchieu,IDPHONGCHIEU',  
            'status' => 'required|boolean',  
        ], [  
            'XUATCHIEU.after' => 'Thời gian xuất chiếu phải sau thời điểm hiện tại.',  
        ]); 
    
        $xuatChieuTime = Carbon::parse($request->XUATCHIEU);
 
        $existingLichChieu = LichChieu::where('IDPHONGCHIEU', $request->IDPHONGCHIEU)  
        ->where('XUATCHIEU', $request->$xuatChieuTime)  
        ->first();  

        if ($existingLichChieu) {  
            return back()->withErrors(['XUATCHIEU' => 'Lịch chiếu này đã tồn tại tại phòng chiếu này vào thời gian này.']);  
        }

        $currentDateTime = now();  

        $conflictLichChieu = LichChieu::where('IDPHONGCHIEU', $request->IDPHONGCHIEU)  
            ->where(function ($query) use ($xuatChieuTime) {  
                $query->whereBetween('XUATCHIEU', [  
                    $xuatChieuTime->copy()->subHours(5),   
                    $xuatChieuTime->copy()->addHours(5)
                ]);  
            })  
            ->first();  

        if ($conflictLichChieu) {  
            return back()->withErrors(['XUATCHIEU' => 'Xuất chiếu phải cách xa các lịch chiếu khác ít nhất 5 giờ.']);  
        } 

        $lichChieu = LichChieu::findOrFail($id);
        $lichChieu->IDPHIM = $request->IDPHIM;
        $lichChieu->XUATCHIEU = $request->XUATCHIEU;
        $lichChieu->IDPHONGCHIEU = $request->IDPHONGCHIEU;
        $lichChieu->status = $request->status;
        $lichChieu->save();
    
        return redirect()->route('lichchieu.index')->with('success', 'Lịch chiếu đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lichChieu = LichChieu::find($id);  
    
        $hasSoldSeats = TrangThaiGhe::where('IDLICHCHIEU', $id)  
        ->where('STATUS', '=', 1) // Kiểm tra STATUS = 1  
        ->exists(); // Kiểm tra sự tồn tại  

        if ($hasSoldSeats) {  
            return redirect()->back()->with('error', 'Không thể xóa lịch chiếu vì đã có ghế được bán.');  
        }  
        // Chỉ cần cập nhật trạng thái nếu không còn lịch chiếu  
        $lichChieu->status = 1; // 
        $lichChieu->save();  

        return redirect()->back()->with('success', 'Lịch chiếu đã được xóa.');
    }

    public function kichHoat(string $id)
    {
        $lichChieu = LichChieu::find($id);  
     
        $lichChieu->status = 0;  
        $lichChieu->save();  

        return redirect()->back()->with('success', 'Lịch chiếu đã được Kích hoạt.');
    }
}
