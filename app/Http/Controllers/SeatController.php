<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeatController extends Controller
{
    public function hienThiGhe($idLichChieu)
    {
        // Lấy thông tin phòng chiếu dựa trên IDLICHCHIEU
        $phongChieu = DB::table('lichchieu')
            ->join('phongchieu', 'lichchieu.IDPHONGCHIEU', '=', 'phongchieu.IDPHONGCHIEU')
            ->join('phim', 'lichchieu.IDPHIM', '=', 'phim.IDPHIM')
            ->join('theloai', 'theloai.IDTHELOAI', '=', 'phim.IDTHELOAI')
            ->select('phongchieu.*', 'phim.*', 'lichchieu.*', 'theloai.TENTHELOAI')
            ->where('lichchieu.IDLICHCHIEU', $idLichChieu)
            ->first();

        session([
            'movie_ID' => $phongChieu->IDPHIM,
            'room_ID' => $phongChieu->IDPHONGCHIEU,
            'schedule_ID' => $phongChieu->IDLICHCHIEU,
        ]);
        session()->save();

        // Lấy danh sách ghế và trạng thái ghế cho lịch chiếu
        $danhSachGhe = DB::table('masoghe')
            ->join('trangthaighe', function ($join) use ($idLichChieu) {
                $join->on('masoghe.IDGHE', '=', 'trangthaighe.IDGHE')
                    ->where('trangthaighe.IDLICHCHIEU', '=', $idLichChieu);
            })
            ->join('loaighe', 'masoghe.IDLOAIGHE', '=', 'loaighe.IDLOAIGHE')
            ->where('masoghe.IDPHONGCHIEU', $phongChieu->IDPHONGCHIEU)
            ->select('masoghe.IDGHE', 'loaighe.TENLOAIGHE', 'loaighe.DONGIA', 'trangthaighe.STATUS')
            ->get();


        return view('movie.seat', compact('phongChieu', 'danhSachGhe'));
    }

    public function storeSeats(Request $request)
    {
        // Lấy danh sách ghế và giá từ request
        $seats = json_decode($request->input('selectedSeats'), true);
        $prices = json_decode($request->input('selectedSeatPrices'), true);

        // Tính tổng tiền dựa trên giá ghế được gửi từ client
        $totalAmount = array_sum($prices);
        $totalSeats = count($seats);

        // Lưu dữ liệu vào session tạm thời
        session([
            'selected_seats' => $seats,
            'seat_prices' => $prices, 
            'total_seats' => $totalSeats,
            'total_amount' => $totalAmount,
        ]);

        return redirect()->route('chondoan'); 
    }
    
}
