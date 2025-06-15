<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chọn Đồ Ăn - {{ $movies->TENPHIM }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/movie/combo.css') }}">
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
            <div class="list_container">
                <div class="item_container">
                    <div class="title">
                        <h3>Trang Chủ </h3><p>></p><h3>Đặt vé</h3><p>></p><h3>{{ $movies->TENPHIM }}</h3>
                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="warning">
                        <p>Theo quy định của cục điện ảnh, phim này không dành cho khán giả dưới 13 tuổi</p>
                    </div>

                    <div class="info-pay">
                        <i class="fa-regular fa-circle-user"></i>
                        <p>THÔNG TIN THANH TOÁN</p>
                    </div>
                    <div class="info-person">
                        <div class="name">
                            <h3>Họ Tên:</h3>
                            <p>{{ Auth::user()->name }}</p>
                        </div>
                        <div class="phone">
                            <h3>Số Điện Thoại: </h3>
                            <input type="tel" name="sdt" class="sdt" pattern="[0-9]{4} [0-9]{3} [0-9]{3}" maxlength="10" required>
                        </div>
                        <div class="email">
                            <h3>Email: </h3>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <input type="hidden" id="totalAmount" value="{{ $totalAmount }}">
                    <div class="seat">
                        <div class="text">
                            <h4>Ghế số</h4>
                        </div>
                        <div class="money">
                            @if (!empty($totalSeats && $totalAmount))
                                <p>Số lượng ghế: {{ $totalSeats }}</p>
                            
                                <p>{{ number_format($totalAmount, 0, ',', '.') }} VNĐ</p>
                            @endif
                        </div>
                    </div>
                    <div class="line"></div>

                    <div class="endow">
                        <div class="item">
                            <p>COMBO ƯU ĐÃI</p>
                        </div>
                        <div class="item">
                            <h3>Tên Combo</h3>
                        </div>
                        <div class="item">
                            <h3>Mô Tả</h3>
                        </div>
                        <div class="item">
                            <h3>Số Lượng</h3>`
                        </div>
                    </div>
                    <div class="line"></div>
                    @foreach ($doans as $doan)
                        <div class="combo_list">
                            <div class="combo_item">
                                <img src="{{ asset('images/' .$doan->IMAGE) }}" alt="{{ $doan->TENDOUONG }}">
                            </div>
                            <div class="combo_item">
                                <h3>{{ $doan->TENDOUONG }}</h3>
                            </div>
                            <div class="combo_item">
                                <p class="desc">{{ $doan->MOTA }}</p>
                            </div>
                            <div class="combo_item quantity">
                                <p>0</p>
                                <i class="fa-solid fa-circle-plus increase" data-price="{{ $doan->DONGIA }}" data-quantity="{{ $doan->SOLUONG }}"></i>
                                <i class="fa-solid fa-circle-minus decrease" data-price="{{ $doan->DONGIA }}"></i>
                                <input type="hidden" value="{{ $doan->IDDOUONG }}">
                            </div>
                        </div>
                        <div class="line"></div>  
                    @endforeach                  

                    <div class="total">
                        <p>Tổng Tiền: </p>
                        <p class="price"></p>
                    </div>
                    <div class="method_payment">
                        <i></i>
                        <h2>PHƯƠNG THỨC THANH TOÁN</h2>
                        <h4>Chọn Thẻ Thanh Toán</h4>
                    </div>
                    <div class="line"></div>
                    <div class="list_card">
                        @foreach ( $payments as $payment)
                            <div class="item_card">
                                <input type="radio" name="payment_method" value="{{ $payment->PAYMENTMETHOD }}" data-name="{{ $payment->PAYMENTMETHOD }}" data-id="{{ $payment->id }}" id="payment_{{ $loop->index }}" {{ $loop->first ? 'checked' : '' }} onclick="savePaymentMethod(this)">
                                <i>#</i>
                                <p>{{ $payment->PAYMENTMETHOD }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="item_container movie">
                    <div class="image">
                        <div class="img">
                            <img src="{{ asset('images/' . $movies->POSTER) }}" alt="{{ $movies->TENPHIM }}">
                        </div>
                        <div class="text">
                            <p>{{ $movies->TENPHIM }}</p>
                            <span>2D Phụ đề</span>
                        </div>
                    </div>
                    <div class="type">
                        <div class="theLoai">
                            <i class="fa-solid fa-tag"></i>
                            <p>Thể Loại</p>
                        </div>
                        <div class="theLoai_text">
                            <span>{{ $movies->TENTHELOAI }}</span>
                        </div>
                    </div>

                    <div class="time">
                        <div class="thoiLuong">
                            <i class="fa-regular fa-clock"></i>
                            <p>Thời Lượng</p>
                        </div>
                        <div class="thoiLuong_text">
                            <span>{{ $movies->THOILUONG }} phút</span>
                        </div>
                    </div>

                    <div class="date">
                        <div class="ngayChieu">
                            <i class="fa-regular fa-calendar-days"></i>
                            <p>Ngày Chiếu</p>
                        </div>
                        <div class="ngayChieu_text">
                            <span>{{ \Carbon\Carbon::parse($movies->XUATCHIEU)->format('d/m/Y'); }}</span>
                        </div>
                    </div>

                    <div class="hour">
                        <div class="gio">
                            <i class="fa-regular fa-clock"></i>
                            <p>Giờ Chiếu</p>
                        </div>
                        <div class="gio_text">
                            <span>{{ \Carbon\Carbon::parse($movies->XUATCHIEU)->format('H:i'); }}</span>
                        </div>
                    </div>

                    <div class="room">
                        <div class="phong">
                            <i class="fa fa-desktop"></i>
                            <p>Phòng Chiếu</p>
                        </div>
                        <div class="phong_text">
                            <span>{{ $movies->TENPHONGCHIEU }}</span>
                        </div>
                    </div>

                    <div class="seat">
                        <div class="ghe">
                            <i class="fa fa-cubes"></i>
                            <p>Ghế Ngồi</p>
                        </div>
                        <div class="ghe_text seat-list">
                            <span>
                                @if (!empty($selectedSeats))
                                    {{ implode(', ', $selectedSeats) }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="button">
                        <a href="{{ route('lichchieu.hienThiGhe', ['idLichChieu' => $movies->IDLICHCHIEU]) }}" class="continue back">Quay lại</a>
                        <a href="javascript:void(0)" class="continue" onclick="showForm()">Tiếp tục</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <form action="{{ route('xacnhanthanhtoan') }}" method="POST">
        @csrf  <!-- Thêm CSRF token bảo mật -->
        
        <div class="xacnhanthanhtoan">
            <h2>Phiếu xác nhận thanh toán</h2>
            <div class="field">
                <label for="">Họ và tên: </label>
                <span>{{ Auth::user()->name }}</span>
                <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
            </div>
            <div class="field">
                <label for="">Email: </label>
                <span>{{ Auth::user()->email }}</span>
                <input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
            </div>
            <div class="field">
                <label for="">Phim: </label>
                <span>{{ $movies->TENPHIM }}</span>
                <input type="hidden" name="movie_name" value="{{ $movies->TENPHIM }}">
            </div>
            <div class="field">
                <label for="">Số ghế: </label>
                <span>
                    @if (!empty($selectedSeats))
                        {{ implode(',', $selectedSeats) }}
                    @endif
                </span>
                <input type="hidden" name="seats" value="{{ implode(',', $selectedSeats) }}">
            </div>
            <div class="field">
                <label for="">Đồ đi kèm: </label>
                <span class="selected-foods"></span>
                <input type="hidden" name="foods" id="foods" value="{{ implode(',', $selectedFoods ?? []) }}">
            </div>
            <div class="field">
                <label for="">Phòng chiếu: </label>
                <span>{{ $movies->TENPHONGCHIEU }}</span>
                <input type="hidden" name="room_name" value="{{ $movies->TENPHONGCHIEU }}">
            </div>
            <div class="field">
                <label for="">Thời gian chiếu: </label>
                <span>{{ $movies->XUATCHIEU }}</span>
                <input type="hidden" name="show_time" value="{{ $movies->XUATCHIEU }}">
            </div>
            <div class="field">
                <label for="">Tổng tiền: </label>
                <span class="price">{{ number_format($totalAmount) }} VNĐ</span>
                <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
            </div>
            <div class="field">
                <label for="">Phương thức thanh toán: </label>
                <span class="payment-method"></span>
                <input type="hidden" name="payment_method" value="{{ $payments->first()->PAYMENTMETHOD ?? '' }}">
                <input type="hidden" name="payment_method_id" value="{{ $payments->first()->ID ?? '' }}">
            </div>
            <div align="center" class="btn_xacnhan">
                <button type="button" id="exit-btn">Huỷ</button>
                <button type="submit">Xác nhận</button>
            </div>
        </div>
    </form>
    

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
<script src="{{ asset('js/movie/combo.js') }}"></script>
<script>
    var mainContainer = document.querySelector('.container');
    function showForm() {
    var form = document.querySelector('.xacnhanthanhtoan');
    form.classList.add('show');
    mainContainer.classList.add('blur-background');
    }

    document.getElementById('exit-btn').addEventListener('click', function() {
        var form = document.querySelector('.xacnhanthanhtoan');
        form.classList.remove('show');
        mainContainer.classList.remove('blur-background');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Lấy radio đầu tiên và các input ẩn
        const firstPaymentInput = document.querySelector('.list_card input[type="radio"]:first-of-type');
        const paymentMethodInput = document.querySelector('input[name="payment_method"]');
        const paymentMethodIdInput = document.querySelector('input[name="payment_method_id"]');
        const paymentMethodSpan = document.querySelector('.field span.payment-method');

        // Nếu chưa có gì được chọn, chọn mặc định phương thức đầu tiên
        if (firstPaymentInput) {
            firstPaymentInput.checked = true;

            // Cập nhật giá trị của input ẩn và hiển thị phương thức
            const paymentMethodName = firstPaymentInput.getAttribute('data-name');
            const paymentMethodId = firstPaymentInput.getAttribute('data-id');

            paymentMethodInput.value = paymentMethodName;
            paymentMethodIdInput.value = paymentMethodId;
            paymentMethodSpan.innerText = paymentMethodName;
        }
    });
    
    function savePaymentMethod(paymentInput) {
        const paymentMethodName = paymentInput.getAttribute('data-name');
        const paymentMethodId = paymentInput.getAttribute('data-id');

        // Cập nhật phương thức thanh toán trong form
        document.querySelector('input[name="payment_method"]').value = paymentMethodName;
        document.querySelector('input[name="payment_method_id"]').value = paymentMethodId;

        // Hiển thị tên phương thức thanh toán
        document.querySelector('.field span.payment-method').innerText = paymentMethodName;
    }


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