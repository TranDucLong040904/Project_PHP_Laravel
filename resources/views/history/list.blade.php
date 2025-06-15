<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lịch sử đặt vé</title>
    <link rel="stylesheet" href="{{ asset('css/history/list.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
</head>
<body>
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
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}!
                </div>
            @endif
            <h1>Lịch Sử Mua Vé</h1>
            @if ($ticketHistory->isEmpty())
                <p class="text-center">Chưa có lịch sử đặt vé.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID hoá đơn</th>
                            <th>Tên Phim</th>
                            <th>Ngày Chiếu</th>
                            <th>Giờ Chiếu</th>
                            <th>Ngày Tạo | Giờ Tạo</th>
                            <th>Chi Tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ticketHistory as $history)
                            <tr>
                                <td>{{ $history->IDBILL_VE }}</td>
                                <td>{{ $history->TENPHIM }}</td>
                                <td>{{ \Carbon\Carbon::parse($history->XUATCHIEU)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($history->XUATCHIEU)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($history->NGAYTAO)->format('d/m/Y') }} | {{ \Carbon\Carbon::parse($history->NGAYTAO)->format('H:i:s') }}</td>
                                <td><a href="{{ route('history.details', $history->IDBILL_VE) }}" class="btn btn-primary">Xem Chi Tiết</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
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