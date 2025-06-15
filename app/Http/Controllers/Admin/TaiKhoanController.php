<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where([['status', 0], ['role', 0]])->get();  
        return view('admin.users.index', compact('users'));
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
    public function show()
    {
        $inactiveUsers = User::where('status', 1)->get();  
        return view('admin.users.show', compact('inactiveUsers')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);  
    
        // Chỉ cần cập nhật trạng thái nếu không còn lịch chiếu  
        $user->STATUS = 1; // Đặt trạng thái thành 0  
        $user->save();   

        return redirect()->back()->with('success', 'Tài khoản đã được khóa.'); 
    }

    public function kichHoat(string $id)
    {
        $user = User::find($id);  
    
        $user->STATUS = 0; // Đặt trạng thái thành 0  
        $user->save();   

        return redirect()->back()->with('success', 'Tài khoản đã được Kích hoạt.'); 
    }
}
