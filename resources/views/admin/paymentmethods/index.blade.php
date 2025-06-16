<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương thức thanh toán</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    @if(Auth::check() && Auth::user()->role == 1)
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <button class="closebtn" onclick="closeNav()">Close</button>
            <div class="user-info">
                <img src="{{ asset('images/admin.png') }}" alt="Admin">
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

        <!-- Nội dung chính -->
        <div class="container" id="main">
            <h1>Danh sách phương thức thanh toán</h1>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <a href="{{ route('methods.create') }}" class="btn btn-success">Thêm Mới</a>
            <a href="{{ route('methods.show') }}" class="btn btn-success">Kích Hoạt</a>

            @if($paymentMethods->isEmpty())
                <div class="alert alert-warning">Không có phương thức thanh toán nào hợp tác.</div>
            @else
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Phương Thức Thanh Toán</th>
                            <th>Trạng Thái</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paymentMethods as $paymentMethod)
                        <tr>
                            <td>{{ $paymentMethod->PAYMENTMETHOD }}</td>
                            <td>
                                @if($paymentMethod->status == 1)
                                    <span style="color: red;">Ngưng sử dụng</span>
                                @else
                                    <span style="color: green;">Đang kích hoạt</span>
                                @endif
                            </td>
                            <td><a href="{{ route('methods.edit', $paymentMethod->id) }}">Sửa</a></td>
                            <td>
                                <form method="POST" action="{{ route('methods.destroy', $paymentMethod->id) }}" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete btn btn-danger">
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @else
        <!-- Nếu không phải admin -->
        <h1 align="center">Xin Chào Admin</h1>
        <p align="center"><a class="btn-Login" href="{{ route('login') }}">Đăng nhập</a></p>
    @endif

    <!-- Scripts -->
    <script>
        function openNav() {
            document.getElementById("sidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("sidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }

        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    if (!confirm('Bạn có chắc muốn xóa phương thức thanh toán này không?')) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>
