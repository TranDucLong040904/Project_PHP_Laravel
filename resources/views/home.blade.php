<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
</head>
<body data-authenticated="{{ Auth::check() ? 'true' : 'false' }}">
<div id="main">
    <div id="header">
        <img src="{{ asset('images/Logo.png') }}" alt="">
        <ul id="nav">
            <li><a href="">Trang chủ</a></li>
            <li><a href="{{ route('prices') }}">Giá vé</a></li>
            <li><a href="{{ route('news') }}">Tin tức</a></li>
            <li>
                <a href="">Khác
                    <i class="fa-solid fa-caret-down"></i>
                </a>
                <ul class="subnav">
                    <li><a href="">Báo cáo</a></li>
                    <li><a href="">Thông tin rạp</a></li>
                </ul>
            </li>
            <li>
                @if(Auth::check() && Auth::user()->role == 0)
                    <div id="UI_user">
                        <a href="javascript:void(0)" class="UI_user" id="openUI_userModal">
                            <i class="fa-regular fa-circle-user"></i>
                        </a>
                        <p>Hi, {{ explode(' ', Auth::user()->name)[count(explode(' ', Auth::user()->name)) - 1] }}!</p>
                    </div>

                    <div id="UI_userModal" class="modal-user">
                        <div class="modal-content">
                            <i class="fa-regular fa-circle-user"></i>
                            <p id="name">{{ Auth::user()->name }}</p>
                            <p>Email:  {{ Auth::user()->email }}</p>
                            <a href="{{ route('history') }}">Lịch sử đặt vé</a>
                            <a href="{{ route('password.update') }}">Đổi mật khẩu</a>
                            <div class="modal-actions">
                                <a href=" {{route('logout')}} " id="logout-btn">Log Out</a>
                            </div>
                        </div>
                    </div>
                @else
                    <button id="btn-login"><a href="{{ route('login') }}">Đăng nhập</a></button>
                @endif
            </li>
        </ul>
    
    </div>

    <div class="banner">
        <div class="list-img">
            <img src="{{ asset('images/banner1.jpg') }}" alt="">
            <img src="{{ asset('images/banner2.jpg') }}" alt="">
            <img src="{{ asset('images/banner3.jpg') }}" alt="">
        </div>
        <div class="btns">
            <div class="btn-left">
                <i class="fa-solid fa-angle-left"></i>  

            </div>

            <div class="btn-right">
                <i class="fa-solid fa-angle-right"></i>  

            </div>
        </div>
    </div>

    <div class="container">
        <div class="top_container">
            <ul class="list">
                <li class="item comming-soon">Phim sắp chiếu</li>
                <li class="item is-showing active">Phim đang chiếu</li>
            </ul>
            <div class="line-top_container"></div>
        </div>
            <!-- phim sắp chiếu -->
        <div class="main_container">
            <div class="movies_container-1">
                @foreach($comingsoons as $coming)
                    <div class="movie-movies_container">
                        <a href="{{ route('movie.detail', $coming->IDPHIM) }}"><img src="{{ asset('images/' . $coming->POSTER) }}" alt="{{ $coming->TENPHIM }}"></a>
                        <a href="{{ route('movie.detail', $coming->IDPHIM) }}"><h3 class="title">{{ $coming->TENPHIM }}</h3></a>
                        <div class="movie_genre">
                            <h4>Thể loại: </h4>
                            @if ($coming->TENTHELOAI)
                                <p>{{ $coming->TENTHELOAI }}</p> <!-- Hiển thị tên thể loại -->
                            @else
                                <p>Chưa rõ thể loại</p> <!-- Xử lý nếu không có thể loại -->
                            @endif
                        </div>
                        <div class="movie_duration">
                            <h4>Thời lượng:</h4>
                            <p>{{ $coming->THOILUONG }} phút</p> 
                        </div>
                        <div class="movie_duration">
                            <h4>Khởi chiếu:</h4>
                            <p>{{ \Carbon\Carbon::parse($coming->NAMPH)->format('d/m/Y'); }}</p> 
                        </div>
                    </div>
                @endforeach               
            </div>
            {{-- Phim đang chiếu --}}
            <div class="movies_container-2 active">
                <!-- Trong vòng lặp movies -->
                @foreach($movies as $movie)
                    <div class="movie-movies_container">
                        <a href="{{ route('movie.detail', $movie->IDPHIM) }}"><img src="{{ asset('images/' . $movie->POSTER) }}" alt="{{ $movie->TENPHIM }}"></a>
                        <a href="{{ route('movie.detail', $movie->IDPHIM) }}"><h3 class="title">{{ $movie->TENPHIM }}</h3></a>
                        <div class="movie_genre">
                            <h4>Thể loại: </h4>
                            @if ($movie->TENTHELOAI)
                                <p>{{ $movie->TENTHELOAI }}</p> <!-- Hiển thị tên thể loại -->
                            @else
                                <p>Chưa rõ thể loại</p> <!-- Xử lý nếu không có thể loại -->
                            @endif
                        </div>
                        <div class="movie_duration">
                            <h4>Thời lượng:</h4>
                            <p>{{ $movie->THOILUONG }} phút</p> 
                        </div>
                        <div class="movie_duration">
                            <h4>Khởi chiếu:</h4>
                            <p>{{ \Carbon\Carbon::parse($movie->NAMPH)->format('d/m/Y'); }}</p> 
                        </div>
                        <div class="button_movie">
                            <input class="buy_ticket" type="submit" value="Mua Vé" data-id="{{ $movie->IDPHIM }}" data-title="{{ $movie->TENPHIM }}">
                        </div>
                    </div>
                    
                    <div class="modal" data-id="{{ $movie->IDPHIM }}">
                        <div class="modal_content">
                            <div class="btn_close">
                                <i class="fa-solid fa-x"></i> <!-- Nút đóng -->
                            </div>
                            <div class="schedule-name_movie">
                                <h3></h3>
                            </div>
            
                            <div class="title">
                                <h1>Group 15 cinema</h1>
                            </div>
            
                            <div class="schedule">
                                <div class="schedule_list">
                                    @if(isset($showtimes[$movie->IDPHIM]))
                                        @foreach ($showtimes[$movie->IDPHIM]->groupBy(function($item) {
                                            return \Carbon\Carbon::parse($item->XUATCHIEU)->format('d/m');
                                        }) as $date => $times)
                                            <div class="schedule_item">
                                                <h4 class="tab" data-date="{{ $date }}">{{ $date }}</h4>
                                            </div> 
                                        @endforeach
                                    @else
                                        <p>Không có lịch chiếu</p>
                                    @endif
                                </div>
                                <div class="line_schedule"></div>
                            
                                <div class="CC">
                                    <h3>2D PHỤ ĐỀ</h3>
                                </div>
                            
                                @if(isset($showtimes[$movie->IDPHIM]))
                                    @foreach ($showtimes[$movie->IDPHIM]->groupBy(function($item) {
                                        return \Carbon\Carbon::parse($item->XUATCHIEU)->format('d/m');
                                    }) as $date => $times)
                                        <div class="schedule-chair_time time-container" data-date="{{ $date }}" style="display: none;">
                                            @foreach ($times as $showtime)
                                                <?php $time = \Carbon\Carbon::parse($showtime->XUATCHIEU)->format('H:i'); ?>
                                                <div class="chair-time">
                                                    <button class="time" data-date="{{ $date }}" data-time="{{ $time }}" data-url="{{ route('lichchieu.hienThiGhe', ['idLichChieu' => $showtime->IDLICHCHIEU]) }}">
                                                        <p>{{ $time }}</p>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach                                
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="modal_small" data-id="{{ $movie->IDPHIM }}">
                        <div class="modal_small-content">
                            <h3>Bạn đang đặt vé xem phim</h3>
                            <div class="btn-close">
                                <i class="fa-solid fa-x"></i>
                            </div>
                            <h2 class="title">
                                {{ $movie->TENPHIM }} <!-- Tên phim -->
                            </h2>
                            <ul class="list">
                                <li class="item">Ngày Chiếu</li>
                                <li class="item">Giờ Chiếu</li>
                            </ul>
                            <ul class="schedule">
                                <li class="item"><span class="selectedDate"></span></li>
                                <li class="item"><span class="selectedTime"></span></li>
                            </ul>
                            @if(Auth::check())
                                <a href="#" class="btn_agree" data-id="{{ $movie->IDPHIM }}">Đồng ý</a>
                            @else
                                <a href="{{ route('login') }}" class="btn_agree">Đồng ý</a>
                            @endif
                        </div>
                    </div>
                @endforeach               
            </div>
        </div>
    </div>
</div>

        <footer>
            <span class="footer-title">Group 15 Cinema</span>
            <ul class="socials">
                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            </ul>
            <div class="info">
                <ul>
                    <li class="footer-list_header">Offers</li>
                    <li><a href="#">Produccts</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul>
                    <li class="footer-list_header">Documents</li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Term of Service</a></li>
                    <li><a href="#">Cookies</a></li>
                </ul>
                <ul>
                    <li class="footer-list_header">For you</li>
                    <li><a href="#">Manuals</a></li>
                    <li><a href="#">Tutorials</a></li>
                    <li><a href="#">Tips and Tricks</a></li>
                    <li><a href="#">F&Q</a></li>
                </ul>
                <ul>
                    <li class="footer-list_header">Work with us</li>
                    <li><a href="#">Affiliate</a></li>
                    <li><a href="#">Collaborations</a></li>
                    <li><a href="#">Sponsorships</a></li>
                    <li><a href="#">Partnerships</a></li>
                </ul>
            </div>
        </footer>
</body>

    <script src="{{ asset('js//home/home.js') }}"></script>
    <script src="{{ asset('js/home/home_user.js') }}"></script>
    <script src="{{ asset('js/home/home_tab.js') }}"></script>

</html>