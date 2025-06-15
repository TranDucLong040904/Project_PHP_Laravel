<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập/Đăng Ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login/user_login.css') }}">
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
            </ul>
        </div>
        <div class="form">
            <div class="tabs">
                <button class="tab-btn active" id="login-tab" onclick="showForm('login')">Đăng Nhập</button>
                <button class="tab-btn" id="register-tab" onclick="showForm('register')">Đăng Ký</button>
            </div>

            <!-- Form Đăng Nhập -->
            <div class="form-container" id="login-form">
                <h2>Đăng Nhập</h2>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}!
                    </div>
                @endif
                @if($ms = Session::get('error'))
                    <div class="alert alert-error">
                        {{$ms}}!
                    </div>
                @endif
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Email</label>
                        <div id="user-input">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" id="username" autocomplete="off" placeholder="Email" name="email" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <div id="password-input">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" id="password" placeholder="password" name="password">
                        </div> 
                    </div>
                    <button type="submit">Đăng Nhập</button>
                </form>
            </div>

            <!-- Form Đăng Ký -->
            <div class="form-container" id="register-form" style="display: none;">
                <h2>Đăng Ký</h2>
                @if ($errors->any())
                    <div class="alert alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="new-name">Họ tên</label>
                        <input type="text" id="new-name" autocomplete="off" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="new-email">Email</label>
                        <input type="text" id="new-email" autocomplete="off" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="new-password">Mật khẩu</label>
                        <input type="password" id="new-password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Xác nhận mật khẩu</label>
                        <input type="password" id="confirm-password" name="password_confirmation" required>
                    </div>
                    <button type="submit">Đăng Ký</button>
                </form>
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
    </div>
    <script src="{{ asset('js/login/user_login.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Kiểm tra session tab để chuyển sang tab đăng ký nếu có lỗi
            if ("{{ session('tab') }}" === "register" || {{ $errors->any() ? 'true' : 'false' }}) {
                showForm('register');
            }
        });
    </script>
    
</body>
</html>
