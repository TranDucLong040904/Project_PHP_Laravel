<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillDouongDetail;
use App\Models\DoUong;
use App\Models\Payment;

class DoUongDetailController extends Controller
{
    public function index()  
    {  
        $billDetails = BillDouongDetail::with(['douong', 'payment'])->get();  

        return view('admin.billdouong.index', compact('billDetails'));  
    }  

    public function create()  
    {  
        $doUongs = DoUong::all(); 
        $payments = Payment::all();  

        return view('admin.billdouong.create', compact('doUongs', 'payments')); 
    }  

    public function store(Request $request)  
    {  
        $validated = $request->validate([  
            'IDDOUONG' => 'required|integer',  
            'SOLUONG' => 'required|integer|min:1',  
            'PAYMENTSTATUS' => 'required|integer',  
            'NGAYTAO' => 'required|date',  
        ]);  
    
        // Lấy thông tin đồ uống để có được giá  
        $doUong = DoUong::find($validated['IDDOUONG']);  
        if (!$doUong) {  
            return redirect()->back()->withErrors(['IDDOUONG' => 'Đồ uống không tồn tại.']);  
        }  
    
        // Cập nhật giá từ đối tượng DoUong  
        $validated['DONGIA'] = $doUong->DONGIA;  
      
    
        // Sử dụng query builder để chèn dữ liệu  
        BillDouongDetail::create([
            'IDDOUONG' => $validated['IDDOUONG'],
            'DONGIA' => $doUong->DONGIA, // Lấy từ $doUong
            'SOLUONG' => $validated['SOLUONG'],
            'NGAYTAO' => $validated['NGAYTAO'],
            'PAYMENTSTATUS' => $validated['PAYMENTSTATUS'],
        ]); 
    
        return redirect()->route('billdouong.index')->with('success', 'Thêm mới thành công!');
    } 
}
