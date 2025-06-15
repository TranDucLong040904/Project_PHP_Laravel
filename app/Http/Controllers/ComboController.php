<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComboController extends Controller
{
    public function chonDoAn() {
        $selectedSeats = session('selected_seats', []); // Lấy danh sách ghế từ session
        $seatPrices = session('seat_prices', []); //Giá đơn ghế đã chọn
        $totalSeats = session('total_seats', 0); // Số lượng ghế
        $totalAmount = session('total_amount', 0); // Tổng tiền
        $movieID = session('movie_ID');
        $idLichChieu = session('schedule_ID');

        $doans = DB::table('douong') 
                ->select('douong.*')
                ->where([
                    ['status' ,'=', 0],
                    ['SOLUONG', '>', 0]
                ])
                ->get();

        $payments = DB::table('payment')
                ->select('payment.*')
                ->where('payment.STATUS', 0)
                ->get();

        $movies = DB::table('phim')
                ->join('theloai', 'phim.IDTHELOAI', '=', 'theloai.IDTHELOAI')
                ->join('lichchieu', 'lichchieu.IDPHIM', '=', 'phim.IDPHIM')
                ->join('phongchieu', 'lichchieu.IDPHONGCHIEU', '=', 'phongchieu.IDPHONGCHIEU')
                ->select('phim.*', 'lichchieu.*', 'theloai.TENTHELOAI', 'phongchieu.*')
                ->where([
                    ['phim.IDPHIM', $movieID],
                    ['lichchieu.IDLICHCHIEU', $idLichChieu],
                ])
                ->first();

        // $selectedPaymentMethod = session('payment_method', null);
        
        return view('movie.combo', compact('selectedSeats', 'seatPrices', 'totalSeats', 'totalAmount', 'doans', 'movies', 'payments'));
    }

    public function updateComboSession(Request $request)
    {
        $foodId = $request->input('foodId');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        // Lấy combo đã chọn từ session hoặc tạo mới nếu chưa có
        $selectedCombos = session('selected_combos', []);

        if ($quantity > 0) {
            // Cập nhật hoặc thêm combo
            $selectedCombos[$foodId] = [
                'quantity' => $quantity,
                'price' => $price,
            ];
        } else {
            // Xóa combo nếu số lượng bằng 0
            unset($selectedCombos[$foodId]);
        }

        // Tính lại tổng giá trị
        $totalPrice = array_reduce($selectedCombos, function ($carry, $combo) {
            return $carry + ($combo['quantity'] * $combo['price']);
        }, 0);

        // Lưu lại vào session
        session(['selected_combos' => $selectedCombos]);
        session(['totalPrice' => $totalPrice]);

        // Trả về phản hồi JSON
        return response()->json([
            'success' => true,
            'totalPrice' => $totalPrice,
            'selectedCombos' => $selectedCombos,
        ]);
    }


    // public function storePaymentMethod(Request $request)
    // {
    //     $paymentMethod = $request->input('paymentMethod'); // Lấy tên phương thức thanh toán từ request

    //     if ($paymentMethod) {
    //         session(['payment_method' => $paymentMethod]); // Lưu tên phương thức vào session
    //         return response()->json(['success' => true, 'message' => 'Phương thức thanh toán đã được lưu.']);
    //     }

    //     return response()->json(['success' => false, 'message' => 'Không có phương thức thanh toán nào được chọn.']);
    // }

}
