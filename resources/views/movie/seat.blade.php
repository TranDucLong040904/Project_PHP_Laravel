<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chọn ghế - {{ $phongChieu->TENPHIM }}</title>
        <link rel="stylesheet" href="{{ asset('css/movie/seat.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
    </head>
    <body>
        @if (session('eeror'))
            <div class="alert alert-danger">
                {{ session('kook') }}
            </div>
        @endif
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
                    @endif
                </li>
            </ul>
        
        </div>

        <div class="container">
            <div class="list_container">
                <div class="item_container">
                    <div class="title">
                        <h3>Trang Chủ </h3><p>></p><h3>Đặt vé</h3><p>></p><h3>{{ $phongChieu->TENPHIM }}</h3>
                    </div>
                    <div class="warning">
                        <p>Theo quy định của cục điện ảnh, phim này không dành cho khán giả dưới 13 tuổi</p>
                    </div>

                    <div class="chair">
                        <div class="status_chair">
                            <div class="item-status_chair">
                                <i class="fa-solid fa-couch empty gray"></i>
                                <p>Ghế Trống</p>
                            </div>
                            <div class="item-status_chair">
                                <i class="fa-solid fa-couch selected blue"></i>
                                <p>Ghế Đang Chọn</p>
                            </div>
                            <div class="item-status_chair">
                                <i class="fa-solid fa-couch sold red"></i>
                                <p>Ghế Đã Bán</p>
                            </div>
                        </div>
                    </div>

                    <div class="screen">
                        <div class="title">
                            <p>MÀN HÌNH CHIẾU</p>
                        </div>
                        <div class="screen-list_chair">
                            @foreach($danhSachGhe as $ghe)
                                <div class="screen-item_chair 
                                    @if($ghe->STATUS == 0) ghe-trong 
                                    @elseif($ghe->STATUS == 1) ghe-da-ban red disabled
                                    @endif">
                                    <!-- Icon thay đổi theo loại ghế -->
                                    <i class="
                                        @if($ghe->TENLOAIGHE == 'Ghế thường') fa-solid fa-cloud 
                                        @elseif($ghe->TENLOAIGHE == 'Ghế Vip') fa-solid fa-couch
                                        {{-- @elseif($ghe->TENLOAIGHE == 'Ghế đôi') fa-solid fa-couch-double  --}}
                                        @endif
                                    "></i>
                                    <h5 data-price="{{ $ghe->DONGIA }}">{{ $ghe->IDGHE }}</h5>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    

                    <div class="type_chair">
                        <div class="list-type_chair">
                            <div class="item-type_chair">
                                <i class="fa-solid fa-cloud"></i>
                                <p>Ghế Thường</p>
                            </div>
                            <div class="item-type_chair">
                                <i class="fa-solid fa-couch"></i>
                                <p>Ghế VIP</p>
                            </div>
                            <div>
                                <p class="quantity"></p> 
                            </div>
                        </div>
                        <div class="total_amount">
                            <p>Tổng tiền</p>
                            <p class="price">0 VNĐ</p>
                        </div>
                    </div>                    
                    
                </div>

                <div class="item_container movie">
                        <div class="image">
                            <div class="img">
                                <img src="{{ asset('images/' . $phongChieu->POSTER) }}" alt="{{ $phongChieu->TENPHIM }}">
                            </div>
                            <div class="text">
                                <p>{{ $phongChieu->TENPHIM }}</p>
                                <span>2D Phụ đề</span>
                            </div>
                        </div>
                        <div class="type">
                            <div class="theLoai">
                                <i class="fa-solid fa-tag"></i>
                                <p>Thể Loại</p>
                            </div>
                            <div class="theLoai_text">
                                <span>{{ $phongChieu->TENTHELOAI }}</span>
                            </div>
                        </div>

                        <div class="time">
                            <div class="thoiLuong">
                                <i class="fa-regular fa-clock"></i>
                                <p>Thời Lượng</p>
                            </div>
                            <div class="thoiLuong_text">
                                <span>{{ $phongChieu->THOILUONG }} phút</span>
                            </div>
                        </div>

                        <div class="date">
                            <div class="ngayChieu">
                                <i class="fa-regular fa-calendar-days"></i>
                                <p>Ngày Chiếu</p>
                            </div>
                            <div class="ngayChieu_text">
                                <span>{{ \Carbon\Carbon::parse($phongChieu->XUATCHIEU)->format('d/m/Y'); }}</span>
                            </div>
                        </div>

                        <div class="hour">
                            <div class="gio">
                                <i class="fa-regular fa-clock"></i>
                                <p>Giờ Chiếu</p>
                            </div>
                            <div class="gio_text">
                                <span>{{ \Carbon\Carbon::parse($phongChieu->XUATCHIEU)->format('H:i'); }}</span>
                            </div>
                        </div>

                        <div class="room">
                            <div class="phong">
                                <i class="fa fa-desktop"></i>
                                <p>Phòng Chiếu</p>
                            </div>
                            <div class="phong_text">
                                <span>{{ $phongChieu->TENPHONGCHIEU }}</span>
                            </div>
                        </div>

                        <div class="seat">
                            <div class="ghe">
                                <i class="fa fa-cubes"></i>
                                <p>Ghế Ngồi</p>
                            </div>
                            <div class="ghe_text seat-list">
                                <span></span>
                            </div>
                        </div>
                        <form action="{{ route('storeSeats') }}" method="POST" id="seatForm">
                            @csrf
                            <!-- Input hidden để lưu danh sách ghế và giá ghế đã chọn -->
                            <input type="hidden" name="selectedSeats" id="selectedSeatsInput">
                            <input type="hidden" id="selectedSeatPricesInput" name="selectedSeatPrices" value="">
                            <button type="submit" class="btn">Tiếp Tục</button>
                        </form>
                        {{-- <a href="{{ route('chondoan') }}" class="btn">Tiếp tục</a> --}}
                    </div>
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

    <script src="{{ asset('js/movie/seat.js') }}"></script>
    <script>
        // Hiện avt nếu đã đăng nhập
        document.getElementById("openUI_userModal").onclick = function () {          // Hiển thị modal login khi nhấn nút LOGIN
            document.getElementById("UI_userModal").classList.add('show');
        }

        window.onclick = function (event) {              // Khi nhấn ra ngoài modal, đóng modal hiện tại
            if (event.target === document.getElementById("UI_userModal")) {
                document.getElementById("UI_userModal").classList.remove('show');
            }
        }
    </script>
    
</html>