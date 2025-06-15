<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhongChieu;
use App\Models\LichChieu;


class PhongChieuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phongChieus = PhongChieu::where('status', 0)->get();  
        return view('admin.phongchieu.index', compact('phongChieus'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.phongchieu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([  
            'TENPHONGCHIEU' => 'required|string|max:100',  
        ]);   
        
        // Lấy ID phòng chiếu cuối cùng và tạo ID mới
        $lastTheLoai = PhongChieu::orderBy('IDPHONGCHIEU', 'desc')->first(); 
        $lastIdNumber = (int) substr($lastTheLoai->IDPHONGCHIEU ?? 'PC0', 2); // Lấy số thứ tự cuối cùng
        $newId = 'PC0' . ($lastIdNumber + 1); // Tăng số thứ tự lên 1, không thêm số 0 dẫn

        // Lưu phòng chiếu mới
        $phongChieu = new PhongChieu();
        $phongChieu->IDPHONGCHIEU = $newId;
        $phongChieu->TENPHONGCHIEU = $request->TENPHONGCHIEU;
        $phongChieu->save();
        
        return redirect()->route('phongchieu.index')->with('success', 'Thêm mới phòng chiếu thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $phongChieus = PhongChieu::where('status', 1)->get();  
        return view('admin.phongchieu.show', compact('phongChieus'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $phongChieu = PhongChieu::findOrFail($id); 
        return view('admin.phongchieu.edit', compact('phongChieu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([  
            'TENPHONGCHIEU' => 'required|string|max:100',  
        ]);    
        $phongChieu = PhongChieu::findOrFail($id);  
         
        $phongChieu->TENPHONGCHIEU = $request->TENPHONGCHIEU;  
        $phongChieu->save();  
    
        return redirect()->route('phongchieu.index')->with('success', 'Cập nhật phòng chiếu thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phongChieu = PhongChieu::findOrFail($id); // Lấy phòng chiếu theo ID  
        // Kiểm tra xem phim có còn lịch chiếu nào không  
        $lichChieuCount = LichChieu::where('IDPHONGCHIEU', $id)->count();  

        if ($lichChieuCount > 0) {  
            return redirect()->back()->with('error', 'Không thể xóa phòng chiếu vì vẫn còn lịch chiếu.');  
        } 

        $phongChieu->STATUS = 1;  
        $phongChieu->save(); 

        return redirect()->route('phongchieu.index')->with('success', 'Xóa phòng chiếu thành công!'); 
    }

    public function kichHoat(string $id)
    {
        $phongChieu = PhongChieu::findOrFail($id);
        

        $phongChieu->STATUS = 0;  
        $phongChieu->save(); 

        return redirect()->route('phongchieu.show')->with('success', 'Kích hoạt phòng chiếu thành công!'); 
    }
}
