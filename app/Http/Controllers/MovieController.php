<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function showMovies()
    {
        // Truy vấn lấy danh sách phim và thông tin thể loại
        $comingsoons = DB::table('phim')
                    ->Join('theloai', 'phim.IDTHELOAI', '=', 'theloai.IDTHELOAI')
                    ->select('phim.*', 'theloai.TENTHELOAI')
                    ->where([
                        ['phim.NAMPH', '>', now()],
                        ['phim.status', '=', 0],
                    ])
                    ->get();

        $movies = DB::table('phim')
                    ->join('theloai', 'phim.IDTHELOAI', '=', 'theloai.IDTHELOAI')
                    ->join('lichchieu', 'phim.IDPHIM', '=', 'lichchieu.IDPHIM')
                    ->select('phim.*', 'theloai.TENTHELOAI')
                    ->where([
                        ['phim.NAMPH', '<=', now()],
                        ['phim.status', '=', 0],
                        ['lichchieu.status', '=', 0],
                    ])
                    ->where ('lichchieu.xuatchieu', '>', now())
                    ->distinct() // Loại bỏ các bản ghi trùng nếu có nhiều lịch chiếu cho một phim
                    ->get();

        // Truy vấn lấy lịch chiếu cho mỗi phim
        $showtimes = DB::table('lichchieu')
                    ->Join('phim', 'phim.IDPHIM', '=', 'lichchieu.IDPHIM')
                    ->select('lichchieu.IDLICHCHIEU', 'lichchieu.IDPHIM', 'lichchieu.XUATCHIEU', 'lichchieu.status')
                    ->where([
                        ['XUATCHIEU', '>', now()],
                        ['lichchieu.status', '=', 0],
                        ])
                    ->orderBy('lichchieu.XUATCHIEU', 'asc')
                    ->get()
                    ->groupBy('IDPHIM');

        $lichChieuList = DB::table('lichchieu')
                    ->select('IDLICHCHIEU', 'IDPHONGCHIEU', 'IDPHIM', 'XUATCHIEU', 'status')
                    ->where([
                        ['XUATCHIEU', '>', now()],
                        ['status', '=', 0],
                        ])
                    ->get();

        return view('home', compact('comingsoons', 'movies', 'showtimes', 'lichChieuList'));
    }

    public function detailMovie($id)
    {
        // Tương tự như trên, sử dụng Query Builder để lấy chi tiết phim
        $movies = DB::table('phim')
                    ->leftJoin('theloai', 'phim.IDTHELOAI', '=', 'theloai.IDTHELOAI')
                    ->select('phim.IDPHIM', 'phim.TENPHIM', 'phim.THOILUONG', 'phim.DAODIEN', 'phim.NAMPH', 'phim.POSTER', 'phim.DESCRIP', 'phim.DIENVIEN', 'theloai.TENTHELOAI')
                    ->where('phim.IDPHIM', $id)
                    ->first();

        $showtimes = DB::table('lichchieu')
                    ->join('phim', 'phim.IDPHIM', '=', 'lichchieu.IDPHIM')
                    ->select('lichchieu.IDLICHCHIEU', 'lichchieu.IDPHIM', 'lichchieu.XUATCHIEU', 'lichchieu.status')
                    ->where([
                        ['lichchieu.IDPHIM', $id],
                        ['lichchieu.XUATCHIEU', '>', now()],
                        ['lichchieu.status', '=', 0],
                        ['phim.NAMPH', '<=', now()],
                    ])
                    ->orderBy('lichchieu.XUATCHIEU', 'asc')
                    ->get();

        return view('movie.in4_movie', compact('movies', 'showtimes'));
    }

}
