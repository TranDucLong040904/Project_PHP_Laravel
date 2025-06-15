<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentMethods = Payment::where('STATUS', 0)->get();   
        return view('admin.paymentmethods.index', compact('paymentMethods')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.paymentmethods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([  
            'PAYMENTMETHOD' => 'required|string|max:50',  
            'STATUS' => 'required|integer|in:0,1', // Chỉ nhận 0 hoặc 1  
        ]);  
    
        // Tạo mới phương thức thanh toán  
        Payment::create([  
            'PAYMENTMETHOD' => $request->PAYMENTMETHOD,  
            'STATUS' => $request->STATUS,  
        ]);  
    
        return redirect()->route('methods.index')->with('success', 'Thêm phương thức thanh toán thành công!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $paymentMethods = Payment::where('STATUS', 1)->get();   
        return view('admin.paymentmethods.show', compact('paymentMethods')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paymentMethod = Payment::findOrFail($id); // Tìm phương thức thanh toán theo ID  
        return view('admin.paymentmethods.edit', compact('paymentMethod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([  
            'PAYMENTMETHOD' => 'required|string|max:50',  
            'STATUS' => 'required|integer|in:0,1', // Chỉ nhận 0 hoặc 1  
        ]);  
    
        // Lấy phương thức thanh toán  
        $paymentMethod = Payment::findOrFail($id);  
        
        // Cập nhật thông tin  
        $paymentMethod->update([  
            'PAYMENTMETHOD' => $request->PAYMENTMETHOD,  
            'STATUS' => $request->STATUS,  
        ]);  
    
        return redirect()->route('methods.index')->with('success', 'Cập nhật phương thức thanh toán thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paymentMethod = Payment::find($id);  
    
        // Chỉ cần cập nhật trạng thái nếu không còn lịch chiếu  
        $paymentMethod->STATUS = 1; // Đặt trạng thái thành 0  
        $paymentMethod->save();   

        return redirect()->back()->with('success', 'Phương thức thanh toán đã được xóa.'); 

    }

    public function kichHoat(string $id)
    {
        $paymentMethod = Payment::find($id);  
    
        // Chỉ cần cập nhật trạng thái nếu không còn lịch chiếu  
        $paymentMethod->STATUS = 0; // Đặt trạng thái thành 0  
        $paymentMethod->save();   

        return redirect()->back()->with('success', 'Phương thức thanh toán đã được kích hoạt.'); 

    }
}
