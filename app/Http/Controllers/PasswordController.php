<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('login.change_password');
    }

    // Xử lý đổi mật khẩu
    public function update(Request $request)
    {   
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'Mật khẩu hiện tại không đúng.',
            ]);
        }

        // Cập nhật mật khẩu
        Auth::user()->update([
            // Show mật khẩu mã hóa
            'password' => Hash::make($request->password),

            //Show mật khẩu gốc
            // 'password' => $request->password,
        ]);

        return redirect()->route('password.edit')->with('status', 'Đổi mật khẩu thành công.');
    }
}
