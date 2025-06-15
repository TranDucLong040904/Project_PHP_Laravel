<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillVe;
use App\Models\Movie;
use App\Models\DoUong;
use App\Models\Ve;
use App\Models\PhongChieu;
use App\Models\Ghe;
use App\Models\BillDouongDetail;
use Carbon\Carbon;

class ThongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy thông tin tháng, năm, và phim từ request
        $month = $request->input('month', Carbon::now()->month); // Lấy tháng từ request, mặc định là tháng hiện tại
        $year = $request->input('year', Carbon::now()->year); // Lấy năm từ request, mặc định là năm hiện tại
        $movieId = $request->input('TENPHIM'); // ID phim được chọn (nếu có)
        $drinkId = $request->input('IDDOUONG'); // ID đồ uống được chọn (nếu có)

        // Truy vấn danh sách hóa đơn theo tháng và năm
        $billsQuery = BillVe::whereYear('NGAYTAO', $year)
                            ->with(['user', 'payment']); // Liên kết với User và Payment

        // Nếu không chọn "Tất cả các tháng", áp dụng điều kiện tháng
        if ($month != 0) {
            $billsQuery->whereMonth('NGAYTAO', $month);
        }

        // Truy vấn dữ liệu
        $bills = $billsQuery->get();

        // Tổng tiền từ danh sách hóa đơn
        $total = $bills->sum('DONGIA');

        // Lấy danh sách phim
        $movies = Movie::where('status', 0)->get();  

        // Khởi tạo như một Collection rỗng  
        $ves = collect();   

        if ($movieId === 'all') {  
            // Truy vấn toàn bộ vé nếu chọn "Tất cả"  
            $ves = Ve::with(['lichChieu.movie', 'phong', 'ghe', 'bill'])->get();   
        } elseif (!empty($movieId)) {  
            // Lấy vé theo phim nếu có chọn  
            $ves = Ve::with(['lichChieu.movie', 'phong', 'ghe', 'bill'])  
                ->whereHas('lichChieu.movie', function ($query) use ($movieId) {  
                    $query->where('IDPHIM', $movieId); // Lọc theo ID phim  
                })  
                ->get(); // get() trả về Collection  
        }  

        // Kiểm tra nếu $ves có dữ liệu thì tính tổng  
        $Tong = $ves->isEmpty() ? 0 : $ves->sum('DONGIA'); 


        // Truy vấn danh sách hóa đơn đồ uống theo ID đồ uống (nếu có chọn)
        $douongs = DoUong::where('status', 0)->get();  
        $billDrinkDetails = collect();   

        if ($drinkId === 'all') {  
            // Lấy tất cả chi tiết hóa đơn đồ uống nếu chọn "Tất cả đồ uống"  
            $billDrinkDetails = BillDouongDetail::with(['douong', 'payment'])->get();   
        } elseif (!empty($drinkId)) {  
            // Lọc theo ID đồ uống nếu có chọn  
            $billDrinkDetails = BillDouongDetail::with(['douong', 'payment'])  
                ->where('IDDOUONG', $drinkId)  
                ->get();   
        }  

        // Tính tổng giá trị  
        $totalDrink = $billDrinkDetails->sum('DONGIA'); 
        $drinks = DoUong::where('status', 0)->get();

        // Trả về view với dữ liệu
        return view('admin.thongke.index', compact(
            'bills', 'month', 'year', 'total', 'ves', 'movies', 'movieId', 'Tong',
            'billDrinkDetails', 'drinks', 'drinkId', 'totalDrink', 'douongs'
        ));
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
        //
    }
}
