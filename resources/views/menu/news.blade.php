<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link rel="stylesheet" href="{{ asset('css/menu/news.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
</head>
<body>
    <div id="main">
        <div id="header">
            <img src="{{ asset('images/Logo.png') }}" alt="">
            <ul id="nav">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li><a href="{{ route('prices') }}">Giá vé</a></li>
                <li><a href="">Tin tức</a></li>
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

        <div class="news">
            <div class="promotions">
                <div class="top_promotions">
                    <div class="item_promotions">
                        <h2 class="new_promotion">Khuyến mãi mới</h2>
                        <img class="image" src="{{ asset('images/news1.png') }}" alt="">
                        <div class="title">
                            <h2>Ngày Chị Em Mình - Ưu Đãi Cực Đỉnh</h2>
                        </div>
                    </div>
                    <div class="item_promotions">
                        <div class="item_promotion">
                            <div class="small-item_promotions">
                                <img src="{{ asset('images/news2.png') }}" alt="">
                                <h4>LỄ HỘI "ĐỔI MA" - ƯU ĐÃI HẾT GA</h4>
                            </div>
    
                            <div class="small-item_promotions">
                                <img src="{{ asset('images/news2.png') }}" alt="">
                                <h4>LỄ HỘI "ĐỔI MA" - ƯU ĐÃI HẾT GA</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bottom_promotions">
                    <div class="item-bottom_promotions">
                        <img src="{{ asset('images/news2.png') }}" alt="">
                        <a href="">ĐẶT VÉ BETA CINEMAS, MOMO LIỀN!</a>

                    </div>

                    <div class="item-bottom_promotions">
                        <img src="{{ asset('images/news2.png') }}" alt="">
                        <a href="">ĐẶT VÉ BETA CINEMAS, MOMO LIỀN!</a>
                    </div>

                    <div class="item-bottom_promotions">
                        <img src="{{ asset('images/news2.png') }}" alt="">
                        <a href="">ĐẶT VÉ BETA CINEMAS, MOMO LIỀN!</a>
                    </div>

                    <div class="item-bottom_promotions">
                        <img src="{{ asset('images/news2.png') }}" alt="">
                        <a href="">ĐẶT VÉ BETA CINEMAS, MOMO LIỀN!</a>
                    </div>
                </div>

                
            </div>

            <div class="side_new">
                <div class="top_promotions">
                    <div class="item_promotions">
                        <h2 class="new_promotion">TIN BÊN LỀ</h2>
                        <img class="image" src="{{ asset('images/news1.png') }}" alt="">
                        <div class="title">
                            <h2>THÀNH LẬP LIÊN DOANH BETA VÀ AEON ENTERTAINMENT</h2>
                        </div>
                    </div>
                    <div class="item_promotions">
                        <div class="item_promotion">
                            <div class="small-item_promotions">
                                <img src="{{ asset('images/news2.png') }}" alt="">
                                <h4>Beta Cinemas Group 15</h4>
                            </div>
    
                            <div class="small-item_promotions">
                                <img src="{{ asset('images/news2.png') }}" alt="">
                                <h4>Beta Cinemas Group 15</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bottom_promotions">
                    <div class="item-bottom_promotions">
                        <img src="{{ asset('images/news2.png') }}" alt="">
                        <a href="">BETA HÀ NỘI!</a>

                    </div>

                    <div class="item-bottom_promotions">
                        <img src="{{ asset('images/news2.png') }}" alt="">
                        <a href="">BETA HÀ NỘI!</a>
                    </div>

                    <div class="item-bottom_promotions">
                        <img src="{{ asset('images/news2.png') }}" alt="">
                        <a href="">BETA HÀ NỘI!</a>
                    </div>

                    <div class="item-bottom_promotions">
                        <img src="{{ asset('images/news2.png') }}" alt="">
                        <a href="">BETA HÀ NỘI!</a>
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