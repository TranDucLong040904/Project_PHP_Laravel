<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khách hàng</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
    <h1>Danh Sách Tài Khoản</h1> 

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif 

    <a href="{{ route('taikhoan.show') }}">Kích Hoạt</a> 

    <table border="1">  
        <thead>  
            <tr>  
                <th>Name</th>  
                <th>Email</th>  
                <th>Password</th>  
                <th>Status</th>  
                <th>Khóa</th>
            </tr>  
        </thead>  
        <tbody>  
            @foreach($users as $user)  
                <tr>  
                    <td>{{ $user->name }}</td>  
                    <td>{{ $user->email }}</td>  
                    <td>{{ $user->password }}</td> 
                    <td>{{ $user->status == 0 ? 'Active' : 'Inactive' }}</td> 
                    <td>
                        <form method="POST" action="{{ route('taikhoan.destroy', $user->id) }}" class="delete-form">  
                            @csrf  
                            @method('DELETE')  
                            <button type="submit" class="btn-delete" data-id="{{ $user->id }}">  
                                Khóa  
                            </button>  
                        </form>  
                    </td> 
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
@else
    <h1 align="center">Xin chào, bạn không có quyền truy cập!</h1>
    <p align="center"><a class="btn-Login" href="{{ route('login') }}">Đăng nhập</a></p>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                const button = event.submitter;
                const hasShowtime = button.getAttribute('data-has-showtime') === 'true';
                const row = form.closest('tr');

                if (hasShowtime) {
                    event.preventDefault();
                    alert('Phim vẫn còn lịch chiếu, không thể xóa.');
                } else {
                    if (confirm('Bạn có chắc muốn khóa tài khoản này không?')) {
                        row.style.display = 'none';
                        form.submit();
                    } else {
                        event.preventDefault();
                    }
                }
            });
        });
    });

    function openNav() {
        document.getElementById("sidebar").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("sidebar").style.width = "0";
    }
</script>
</body>
</html>
