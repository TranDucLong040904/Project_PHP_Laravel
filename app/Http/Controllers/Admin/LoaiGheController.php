<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiGhe;
class LoaiGheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ghes = LoaiGhe::all();
        return view('admin.loaighe.index', compact('ghes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $ghe = LoaiGhe::findOrFail($id);  
        return view('admin.loaighe.edit', compact('ghe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([    
            'DONGIA' => 'required|numeric',  
        ]);  
    
        // Tìm loại ghế hiện tại  
        $loaighe = LoaiGhe::findOrFail($id);  
    
        // Cập nhật thông tin loại ghế  
        $loaighe->update($request->all());  
    
        return redirect()->route('loaighe.index')->with('success', 'Loại ghế đã được cập nhật thành công.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
