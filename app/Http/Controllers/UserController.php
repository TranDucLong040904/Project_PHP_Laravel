<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login() {
        return view('login.user_login');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Email này đã được đăng ký.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['status'] = 0;

        try {
            User::create($data);
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'Có lỗi xảy ra, vui lòng thử lại sau.'])
                        ->with('tab', 'register');
        }
        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }


    public function postLogin(Request $request)
    {
        // Lấy thông tin người dùng từ cơ sở dữ liệu
        $user = DB::table('users')->where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            // Kiểm tra nếu tài khoản bị vô hiệu hóa
            if ($user->status == 1) {
                return redirect()->back()->with('error', 'Tài khoản của bạn đã bị vô hiệu hóa!');
            }
    
            // Đăng nhập người dùng
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Kiểm tra role và chuyển hướng
                if ($user->role == 1) { // role = 1 -> Admin
                    return redirect()->route('admin.index');
                } elseif ($user->role == 0) { // role = 0 -> User thông thường
                    return redirect()->route('home');
                }
            }
        }
    
        // Sai tài khoản hoặc mật khẩu
        return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu!');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
