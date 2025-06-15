<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillVe;
use App\Models\Payment;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = BillVe::with( 'payment')->get(); // Lấy tất cả hóa đơn vé cùng với thông tin người dùng và phương thức thanh toán  
        return view('admin.bill.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payments = Payment::all(); // Lấy tất cả phương thức thanh toán  
        return view('admin.bill.create', compact('payments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([  
            'name' => 'required|string|max:255',  
            'DONGIA' => 'required|numeric',  
            'PAYMENTID' => 'required|exists:payment,id', 
        ]);
    
        BillVe::create([  
            'name' => $request->input('name'),  
            'DONGIA' => $request->input('DONGIA'),  
            'NGAYTAO' => now(),  
            'PAYMENTID' => $request->input('PAYMENTID'),  
        ]);  
    
        return redirect()->route('bills.index')->with('success', 'Hóa đơn vé đã được thêm thành công!');
    
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
        $bill = BillVe::findOrFail($id); // Tìm hóa đơn theo ID  
        $payments = Payment::all(); // Lấy tất cả phương thức thanh toán  
        return view('admin.bill.edit', compact('bill', 'payments'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([  
            'name' => 'required|string|max:255',  
            'DONGIA' => 'required|numeric',  
            'PAYMENTID' => 'required|exists:payment,id',  
        ]);  
        
        $bill = BillVe::findOrFail($id); // Tìm hóa đơn để cập nhật  
        $bill->update([  
            'name' => $request->input('name'),  
            'DONGIA' => $request->input('DONGIA'),  
            'PAYMENTID' => $request->input('PAYMENTID'),  
        ]);  
        
        return redirect()->route('bills.index')->with('success', 'Hóa đơn vé đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bill = BillVe::findOrFail($id); // Lấy hóa đơn theo ID  
        $bill->delete(); // Xóa hóa đơn  

        return redirect()->route('bills.index')->with('success', 'Hóa đơn vé đã được xóa thành công!'); 
    }
}
