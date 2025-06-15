<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ve;
use App\Models\Ghe;
use App\Models\PhongChieu;
use App\Models\LichChieu;
use App\Models\BillVe;

class VeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ves = Ve::with(['ghe', 'phong'])->get();  
        return view('admin.ve.index', compact('ves')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ghes = Ghe::all(); // Lấy tất cả ghế  
        $phongs = PhongChieu::all(); // Lấy tất cả phòng 
        $lichChieus = LichChieu::all(); // Lấy tất cả lịch chiếu  
        $bills = BillVe::all(); 
        return view('admin.ve.create', compact('ghes', 'phongs', 'lichChieus', 'bills')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([  
            'IDGHE' => 'required|array:masoghe, IDGHE',  
            'IDPHONGCHIEU' => 'required|exists:phongchieu,IDPHONGCHIEU',  
            'IDBILL_VE' => 'required|exists:bill_ve,IDBILL_VE',  
            'IDLICHCHIEU' => 'required|string|max:10',  
            'DONGIA' => 'required|numeric',  
            'status' => 'required|integer',  
        ]);  
    
        // Kết hợp tất cả IDGHE thành một chuỗi  
        $idGheString = implode(', ', $validatedData['IDGHE']);  
    
        // Lưu vào cơ sở dữ liệu  
        Ve::create([  
            'IDGHE' => $idGheString,  // Lưu chuỗi ghế  
            'IDPHONGCHIEU' => $validatedData['IDPHONGCHIEU'],  
            'IDLICHCHIEU' => $validatedData['IDLICHCHIEU'],  
            'IDBILL_VE' => $validatedData['IDBILL_VE'],  
            'DONGIA' => $validatedData['DONGIA'],  
            'status' => $validatedData['status'],  
        ]);  
    
        return redirect()->route('ve.index')->with('success', 'Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ve = Ve::findOrFail($id);  

        // Tắt phân tích chuỗi IDGHE thành mảng để hiển thị trong form  
        $idGheArray = explode(', ', $ve->IDGHE);  
        $ghes = Ghe::where('IDGHE')->get();
        return view('admin.ve.edit', compact('ve', 'idGheArray', 'ghes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([  
            'IDGHE' => 'required|array:masoghe, IDGHE',  
            'IDPHONGCHIEU' => 'required|exists:phongchieu,IDPHONGCHIEU',  
            'IDBILL_VE' => 'required|exists:bill_ve,IDBILL_VE',  
            'IDLICHCHIEU' => 'required|string|max:10',  
            'DONGIA' => 'required|numeric',  
            'status' => 'required|integer',  
        ]);  
    
        // Kết hợp tất cả IDGHE thành một chuỗi  
        $idGheString = implode(', ', $validatedData['IDGHE']);  
        
        // Cập nhật thông tin vé  
        $ve = Ve::findOrFail($id);  
        $ve->update([  
            'IDGHE' => $idGheString,  
            'IDPHONGCHIEU' => $validatedData['IDPHONGCHIEU'],  
            'IDBILL_VE' => $validatedData['IDBILL_VE'],  
            'IDLICHCHIEU' => $validatedData['IDLICHCHIEU'],  
            'DONGIA' => $validatedData['DONGIA'],  
            'status' => $validatedData['status'],  
        ]);  
    
        return redirect()->route('ve.index')->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bill = Ve::findOrFail($id);   
        $bill->delete();  
 
        return redirect()->route('ve.index')->with('success', 'Xóa vé thành công!');
    }
}
