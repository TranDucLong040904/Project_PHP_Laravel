<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function showHistory()
    {
        $userId = Auth::id();
        $ticketHistory = DB::table('bill_ve')
            ->join('ve', 'bill_ve.IDBILL_VE', '=', 've.IDBILL_VE')
            ->join('lichchieu', 've.IDLICHCHIEU', '=', 'lichchieu.IDLICHCHIEU')
            ->join('phim', 'lichchieu.IDPHIM', '=', 'phim.IDPHIM')
            ->select(
                'bill_ve.IDBILL_VE',
                'phim.TENPHIM',
                'lichchieu.XUATCHIEU',
                'bill_ve.NGAYTAO',
            )
            ->where('bill_ve.name', '=', Auth::user()->name)
            ->orderBy('bill_ve.IDBILL_VE', 'desc')
            ->distinct()
            ->get();

        return view('history.list', compact('ticketHistory'));
    }

    public function showDetails($id)
    {
        // Lấy thông tin chi tiết vé
        $ticketDetails = DB::table('ve')
            ->join('bill_ve', 've.IDBILL_VE', '=', 'bill_ve.IDBILL_VE')
            ->join('phongchieu', 've.IDPHONGCHIEU', '=', 'phongchieu.IDPHONGCHIEU')
            ->select('ve.IDVE', 've.IDGHE', 'phongchieu.TENPHONGCHIEU', 've.IDLICHCHIEU', 'bill_ve.NGAYTAO', 've.DONGIA as VE_DONGIA', 'bill_ve.DONGIA as BILL_DONGIA')
            ->where('ve.IDBILL_VE', '=', $id)
            ->get();

        // Lấy thông tin bill đồ uống liên quan
        $drinkDetails = DB::table('bill_douong_detail')
            ->join('douong', 'bill_douong_detail.IDDOUONG', '=', 'douong.IDDOUONG')
            ->join('bill_ve', 'bill_douong_detail.IDBILL_VE', '=', 'bill_ve.IDBILL_VE')
            ->select('bill_douong_detail.IDBILL_DOUONG', 'douong.TENDOUONG', 'bill_douong_detail.SOLUONG', 'douong.DONGIA', DB::raw('(douong.DONGIA + bill_ve.DONGIA) as TONGDONGIA'))
            ->where('bill_douong_detail.name', '=', Auth::user()->name)
            ->where('bill_douong_detail.IDBILL_VE', '=', $id)
            ->get();

        // //Lấy thông tin giá và tổng tiền
        // $drinkPrices = DB::table('bill_douong_detail')
        //     ->join('douong', 'bill_douong_detail.IDDOUONG', '=', 'douong.IDDOUONG')
        //     ->join('bill_ve', 'bill_douong_detail.IDBILL_VE', '=', 'bill_ve.IDBILL_VE')
        //     ->select(
        //         'bill_douong_detail.IDBILL_VE',
        //         DB::raw('SUM(douong.DONGIA * bill_douong_detail.SOLUONG) as TONGDONGIA_DO_UONG'),
        //         'bill_ve.DONGIA as DONGIA_VE',
        //         DB::raw('SUM(douong.DONGIA * bill_douong_detail.SOLUONG) + bill_ve.DONGIA as TONGTIEN') 
        //     )
        //     ->where('bill_douong_detail.name', '=', Auth::user()->name)
        //     ->where('bill_douong_detail.IDBILL_VE', '=', $id)
        //     ->groupBy('bill_douong_detail.IDBILL_VE', 'bill_ve.DONGIA')
        //     ->get();
        

        return view('history.details', compact('ticketDetails', 'drinkDetails'));
    }
}
