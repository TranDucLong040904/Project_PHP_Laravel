<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\Movie;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = TheLoai::all();
        return view('admin.theloai.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'TENTHELOAI' => 'required|max:255',
        ]);

        // Tạo IDTHELOAI tự động
        $lastTheLoai = TheLoai::orderBy('IDTHELOAI', 'desc')->first(); // Lấy thể loại cuối cùng
        $newId = 'TL' . str_pad(substr($lastTheLoai->IDTHELOAI ?? 'TL000', 2) + 1, 3, '0', STR_PAD_LEFT); // Tạo ID tự động như TL001, TL002, ...

        // Lưu thể loại mới
        $theLoai = new TheLoai();
        $theLoai->IDTHELOAI = $newId;
        $theLoai->TENTHELOAI = $request->TENTHELOAI;
        $theLoai->save();

        return redirect()->route('theloai.index')->with('success', 'Thể loại đã được thêm mới!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = TheLoai::findOrFail($id); // Tìm thể loại theo IDTHELOAI
        return view('admin.theloai.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'TENTHELOAI' => 'required|max:255',
        ]);

        // Tìm thể loại cần sửa
        $theLoai = TheLoai::findOrFail($id);

        // Cập nhật thông tin thể loại
        $theLoai->TENTHELOAI = $request->TENTHELOAI;
        $theLoai->save();

        return redirect()->route('theloai.index')->with('success', 'Thể loại đã được sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $theLoai = TheLoai::findOrFail($id); 

        // Kiểm tra nếu thể loại này có đang được sử dụng trong bảng Movie
        $isUsedInMovie = Movie::where('IDTHELOAI', $id)->exists();

        if ($isUsedInMovie) {
            // Nếu thể loại đang được sử dụng, trả về thông báo lỗi
            return redirect()->route('theloai.index')->with('error', 'Không thể xóa thể loại này vì nó đang được sử dụng trong một bộ phim!');
        }

        // Nếu không có bộ phim nào sử dụng thể loại này, tiến hành xóa
        $theLoai->delete();

        // Quay lại trang danh sách thể loại và hiển thị thông báo thành công
        return redirect()->route('theloai.index')->with('success', 'Thể loại đã được xóa thành công!');
    }
}
