<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Phim {{ $movies->TENPHIM }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/movie/in4_movie.css') }}">
</head>
<body data-authenticated="{{ Auth::check() ? 'true' : 'false' }}">
    <div id="main">
        <div id="header">
            <img src="{{ asset('images/Logo.png') }}" alt="">
            <ul id="nav">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
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

        <div class="detail_movie">
            <h2 class="title">
                Trang chủ > <span>{{ $movies->TENPHIM }}</span>
            </h2>
            <div class="description">
                <div class="item_description">
                    <img src="{{ asset('images/' . $movies->POSTER) }}" alt="{{ $movies->TENPHIM }}">
                </div>
                <div class="item_description">
                    <h2 class="title">{{ $movies->TENPHIM }}</h2>
                    <p class="desc">{{ $movies->DESCRIP }}</p>
                    <div class="item">
                        <h3>Đạo Diễn:</h3>
                        <p>{{ $movies->DAODIEN }}</p>
                    </div>
                    <div class="item">
                        <h3>Diễn Viên:</h3>
                        <p>{{ $movies->DIENVIEN }}</p>
                    </div>
                    <div class="item">
                        <h3>Thể loại:</h3>
                        <p>
                            @if ($movies->TENTHELOAI)
                                {{ $movies->TENTHELOAI }} 
                            @else
                                Chưa rõ thể loại
                            @endif

                        </p>
                    </div>
                    <div class="item">
                        <h3>Thời Lượng:</h3>
                        <p>{{ $movies->THOILUONG }} phút</p>
                    </div>
                    <div class="item">
                        <h3>Ngày khởi chiếu:</h3>
                        <p>{{ \Carbon\Carbon::parse($movies->NAMPH)->format('d/m/Y'); }}</p>
                    </div>
                </div>
            </div>

            <div class="schedule">
                <div class="schedule_list">
                    @foreach ($showtimes->groupBy(function($date) {
                        return \Carbon\Carbon::parse($date->XUATCHIEU)->format('d/m');
                    }) as $date => $times)
                        <div class="schedule_item">
                            <a class="tab" data-date="{{ $date }}">{{ $date }}</a>
                        </div> 
                    @endforeach
                </div>
                <div class="line_schedule"></div>
            
                <div class="CC">
                    <h3>2D PHỤ ĐỀ</h3>
                </div>
            
                @foreach ($showtimes->groupBy(function($date) {
                    return \Carbon\Carbon::parse($date->XUATCHIEU)->format('d/m');
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
            </div>

            <div class="modal_small">
                <div class="modal_small-content">
                    <h3>Bạn đang đặt vé xem phim</h3>
                    <div class="btn-close">
                        <i class="fa-solid fa-x"></i>
                    </div>
                    <h2 class="title">
                        {{ $movies->TENPHIM }} <!-- Tên phim -->
                    </h2>
                    <ul class="list">
                        <li class="item">Ngày Chiếu</li>
                        <li class="item">Giờ Chiếu</li>
                    </ul>
                    <ul class="schedule">
                        <li class="item"><span id="selectedDate"></span></li>
                        <li class="item"><span id="selectedTime"></span></li>
                    </ul>
                    @if(Auth::check())
                        <a href="#" id="btnAgree" class="btn_agree">Đồng ý</a>
                
                    @else
                        <a href="{{ route('login') }}" id="btnAgree" class="btn_agree">Đồng ý</a>
                    @endif
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
    <script src="{{ asset('js/movie/in4_movie.js') }}"></script> 
    <script src="{{ asset('js/movie/in4_movie_user.js') }}"></script>   
</html>