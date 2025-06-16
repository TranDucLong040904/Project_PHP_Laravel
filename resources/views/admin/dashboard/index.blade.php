<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ Admin</title>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <style>
        .btn-Login {
            text-decoration: none;
            margin-top: 15px;
            background-color: #929696; /* Màu nền */
            border: none; /* Loại bỏ viền */
            padding: 10px 20px; /* Khoảng cách trong nút */
            cursor: pointer; /* Đổi con trỏ khi hover */
            border-radius: 30px; /* Góc bo tròn cho nút */
            text-transform: uppercase; /* Chữ in hoa */
            margin-left: 20px;
            color: white;
        }

        .btn-Login:hover {
            background-color: #6d7171; /* Màu khi hover */
            box-shadow: 0 4px 8px #6d7171;
        }
    </style>
</head>
<body>
    @if(Auth::check() && Auth::user()->role == 1)
        <div class="sidebar" id="sidebar">
            <button class="closebtn" onclick="closeNav()">Close</button>
            <div class="user-info">
                <img src="images/admin.png" alt="">
                <p>Hi, {{ explode(' ', Auth::user()->name)[count(explode(' ', Auth::user()->name)) - 1] }}!</p>


                <a href="{{ route('logoutAdmin') }}">Đăng xuất</a>
            </div>
            
            <ul class="menu">
                <li><a href="{{ route('admin.index') }}">Admin</a></li>
                <li><a href="{{ route('phim.index') }}">Quản lý phim</a></li>
                <li><a href="{{ route('theloai.index') }}">Quản lý thể loại</a></li>
                <li><a href="{{ route('lichchieu.index') }}">Quản lý lịch chiếu</a></li>
                <li><a href="{{ route('phongchieu.index') }}">Quản lý phòng chiếu</a></li>
                <li><a href="{{ route('douong.index') }}">Quản lý Đồ Uống</a></li>
                <li><a href="{{ route('loaighe.index') }}">Quản lý Loại ghế</a></li>
                <li><a href="{{ route('methods.index') }}">Quản lý phương thức thanh toán</a></li>
                <li><a href="{{ route('taikhoan.index') }}">Quản lý tài khoản</a></li>
                <!-- <li><a href="{{ route('thongke.index') }}">Thống kê doanh thu</a></li> -->
            </ul>
        </div>
        
        <button class="openbtn" onclick="openNav()">&#9776; Open Sidebar</button>
        <h1 align = center>Xin Chào Admin</h1>
    @else
        <h1 align = center>Xin Chào Admin</h1>
        <p align = center><a class="btn-Login" href="{{ route('login') }}">Đăng nhập</a></p>
    @endif

</body>
<script>
        function openNav() {
            document.getElementById("sidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("sidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>

</html>