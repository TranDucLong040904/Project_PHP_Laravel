<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShowtimesController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\Admin\PhimController;
use App\Http\Controllers\Admin\TheLoaiController;
use App\Http\Controllers\Admin\PhongChieuController;
use App\Http\Controllers\Admin\MethodController;
use App\Http\Controllers\Admin\LichChieuController;
use App\Http\Controllers\Admin\TaiKhoanController;
use App\Http\Controllers\Admin\DoUongController;
use App\Http\Controllers\Admin\LoaiGheController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\ThongKeController;
use App\Http\Controllers\Admin\DoUongDetailController;
use App\Http\Controllers\Admin\VeController;
use App\Http\Controllers\Admin\DashboardController;

//User
//Trang chủ
Route::get('/', [MovieController::class, 'showMovies'])->name('home');
Route::get('/tin-tuc', function () {
    return view('menu.news');
})->name('news');
Route::get('/bang-gia', function () {
    return view('menu.price_ticket');
})->name('prices');

//Đăng nhập, đăng ký
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin']);

Route::post('/register', [UserController::class, 'postRegister'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//Đổi mk
Route::get('/change-password', [PasswordController::class, 'edit'])->name('password.edit');
Route::post('/change-password', [PasswordController::class, 'update'])->name('password.update');


//Chi tiết phim, ghế, đồ ăn
Route::get('/movie/{id}', [MovieController::class, 'detailMovie'])->name('movie.detail');
Route::get('/lich-chieu/{idLichChieu}/chon-ghe', [SeatController::class, 'hienThiGhe'])->name('lichchieu.hienThiGhe');
Route::post('/seat/store', [SeatController::class, 'storeSeats'])->name('storeSeats');
Route::get('/chon-do-an', [ComboController::class, 'chonDoAn'])->name('chondoan');
Route::post('/update-combo-session', [ComboController::class, 'updateComboSession'])->name('update.combo.session'); //Gửi đồ ăn đã chọn

//Thanh toán
Route::post('/store-payment-method', [ComboController::class, 'storePaymentMethod'])->name('storePaymentMethod'); //Chọn pthuc thanh toán
Route::post('/xacnhanthanhtoan', [PaymentController::class, 'xacNhanThanhToan'])->name('xacnhanthanhtoan');

//Lịch sử 
Route::get('/history', [HistoryController::class, 'showHistory'])->name('history');
Route::get('/history/{id}', [HistoryController::class, 'showDetails'])->name('history.details');


//Admin
//Đăng nhập admin
Route::get('/login-admin', [UserController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/login-admin', [UserController::class, 'postLoginAdmin']);
Route::get('/logout-admin', [UserController::class, 'logoutAdmin'])->name('logoutAdmin');

//Trang chủ admin
Route::get('admin', [DashboardController::class, 'index'])->name('admin.index');
// quản lý phim
Route::get('/phim', [PhimController::class, 'index'])->name('phim.index'); 
Route::get('/phim/create', [PhimController::class, 'create'])->name('phim.create');  
Route::post('/phim', [PhimController::class, 'store'])->name('phim.store');  
Route::delete('/phim/{id}', [PhimController::class, 'destroy'])->name('phim.destroy');
Route::get('/phim/inactive', [PhimController::class, 'show'])->name('phim.show');
Route::delete('/phim/kichHoat/{id}', [PhimController::class, 'kichHoat'])->name('phim.kichHoat');
Route::get('/phim/{id}/edit', [PhimController::class, 'edit'])->name('phim.edit');
Route::put('/phim/{id}', [PhimController::class, 'update'])->name('phim.update');

// quản lý thể loại
Route::get('/theloai', [TheLoaiController::class, 'index'])->name('theloai.index');
Route::get('/theloai/create', [TheLoaiController::class, 'create'])->name('theloai.create');
Route::post('/theloai', [TheLoaiController::class, 'store'])->name('theloai.store');
Route::get('/theloai/{id}/edit', [TheLoaiController::class, 'edit'])->name('theloai.edit');
Route::put('/theloai/{id}', [TheLoaiController::class, 'update'])->name('theloai.update');
Route::delete('/theloai/{id}', [TheLoaiController::class, 'destroy'])->name('theloai.destroy');

//quản lý phòng chiếu 
Route::get('/phongchieu', [PhongChieuController::class, 'index'])->name('phongchieu.index');
Route::get('/phongchieu/create', [PhongChieuController::class, 'create'])->name('phongchieu.create');  
Route::post('/phongchieu', [PhongChieuController::class, 'store'])->name('phongchieu.store');
Route::get('/phongchieu/{id}/edit', [PhongChieuController::class, 'edit'])->name('phongchieu.edit');  
Route::post('/phongchieu/{id}', [PhongChieuController::class, 'update'])->name('phongchieu.update');
Route::delete('/phongchieu/{id}', [PhongChieuController::class, 'destroy'])->name('phongchieu.destroy');
Route::get('/phongchieu/inactive', [PhongChieuController::class, 'show'])->name('phongchieu.show');
Route::delete('/phongchieu/kichHoat/{id}', [PhongChieuController::class, 'kichHoat'])->name('phongchieu.kichHoat');

//Quản lý payment
Route::get('/paymentmethods', [MethodController::class, 'index'])->name('methods.index');
Route::get('/paymentmethods/create', [MethodController::class, 'create'])->name('methods.create');  
Route::post('/paymentmethods', [MethodController::class, 'store'])->name('methods.store');  
Route::get('/paymentmethods/{id}/edit', [MethodController::class, 'edit'])->name('methods.edit');  
Route::put('/paymentmethods/{id}', [MethodController::class, 'update'])->name('methods.update');
Route::delete('/paymentmethods/{id}', [MethodController::class, 'destroy'])->name('methods.destroy'); 
Route::get('/paymentmethods/inactive', [MethodController::class, 'show'])->name('methods.show');
Route::delete('/paymentmethods/kichHoat/{id}', [MethodController::class, 'kichHoat'])->name('methods.kichHoat');

//Quản lý lịch chiếu
Route::get('/lichchieu', [LichChieuController::class, 'index'])->name('lichchieu.index');
Route::get('/lichchieu/create', [LichChieuController::class, 'create'])->name('lichchieu.create');
Route::post('/lichchieu/store', [LichChieuController::class, 'store'])->name('lichchieu.store');
Route::get('/lichchieu/{id}/edit', [LichChieuController::class, 'edit'])->name('lichchieu.edit');
Route::put('/lichchieu/{id}', [LichChieuController::class, 'update'])->name('lichchieu.update');
Route::delete('/lichchieu/{id}', [LichChieuController::class, 'destroy'])->name('lichchieu.destroy');
Route::get('/lichchieu/inactive', [LichChieuController::class, 'show'])->name('lichchieu.show');
Route::delete('/lichchieu/kichHoat/{id}', [LichChieuController::class, 'kichHoat'])->name('lichchieu.kichHoat');

//Quản lý tài khoản 
Route::get('/taikhoan', [TaiKhoanController::class, 'index'])->name('taikhoan.index');
Route::get('/taikhoan/inactive', [TaiKhoanController::class, 'show'])->name('taikhoan.show');
Route::delete('/taikhoan/{id}', [TaiKhoanController::class, 'destroy'])->name('taikhoan.destroy'); 
Route::delete('/taikhoan/kichhoat/{id}', [TaiKhoanController::class, 'kichHoat'])->name('taikhoan.kichHoat'); 

//Quản lý đồ uống
Route::get('/douong', [DoUongController::class, 'index'])->name('douong.index');
Route::get('/douong/create', [DoUongController::class, 'create'])->name('douong.create'); // Hiển thị form  
Route::post('/douong', [DoUongController::class, 'store'])->name('douong.store');
Route::get('/douong/{id}/edit', [DoUongController::class, 'edit'])->name('douong.edit'); // Hiển thị form sửa  
Route::put('/douong/{id}', [DoUongController::class, 'update'])->name('douong.update');
Route::delete('/douong/{id}', [DoUongController::class, 'destroy'])->name('douong.destroy');
Route::get('/douong/inactive', [DoUongController::class, 'show'])->name('douong.show');
Route::delete('/douong/kichHoat/{id}', [DoUongController::class, 'kichHoat'])->name('douong.kichHoat');

//Quản lý loại ghế
Route::get('/loaighe', [LoaiGheController::class, 'index'])->name('loaighe.index');
Route::get('/loaighe/{id}/edit', [LoaiGheController::class, 'edit'])->name('loaighe.edit');
Route::put('/loaighe/{id}', [LoaiGheController::class, 'update'])->name('loaighe.update');

//Quản lý bill
Route::get('/bills', [BillController::class, 'index'])->name('bills.index');
Route::get('/bills/create', [BillController::class, 'create'])->name('bills.create');  
Route::post('/bills', [BillController::class, 'store'])->name('bills.store');
Route::get('/bills/{id}/edit', [BillController::class, 'edit'])->name('bills.edit');  
Route::put('/bills/{id}', [BillController::class, 'update'])->name('bills.update'); 
Route::delete('bills/{id}', [BillController::class, 'destroy'])->name('bills.destroy');

//Ve
Route::get('/ve', [VeController::class, 'index'])->name('ve.index');
Route::get('/ve/create', [VeController::class, 'create'])->name('ve.create'); 
Route::post('/ve', [VeController::class, 'store'])->name('ve.store'); 
Route::get('ve/{id}/edit', [VeController::class, 'edit'])->name('ve.edit');  
Route::put('ve/{id}', [VeController::class, 'update'])->name('ve.update'); 
Route::delete('ve/{id}', [VeController::class, 'destroy'])->name('ve.destroy');

// thống kê
Route::get('thongke', [ThongKeController::class, 'index'])->name('thongke.index'); 

// detail
Route::get('/billdouong', [DoUongDetailController::class, 'index'])->name('billdouong.index'); 
Route::get('/billdouong/create', [DoUongDetailController::class, 'create'])->name('billdouong.create');  
Route::post('/billdouong', [DoUongDetailController::class, 'store'])->name('billdouong.store'); 











