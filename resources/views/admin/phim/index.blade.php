<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phim</title>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>
@if(Auth::check() && Auth::user()->role == 1)
    <div class="sidebar" id="sidebar">
        <button class="closebtn" onclick="closeNav()">Close</button>
        <div class="user-info">
            <img src="{{ asset('images/admin.png') }}" alt="">
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
@else
    <h1 align="center">Xin Chào Admin</h1>
    <p align="center"><a class="btn-Login" href="{{ route('login') }}">Đăng nhập</a></p>
@endif

@if(Auth::check() && Auth::user()->role == 1)
    <h1>Danh Sách Phim</h1> 
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif 
    @if(session('error'))  
        <div class="alert alert-danger">  
            {{ session('error') }}  
        </div>  
    @endif
    <a href="{{ route('phim.create') }}">Thêm Mới</a>
    <a href="{{ route('phim.show') }}">Kích Hoạt</a>
    <table border="1">  
        <thead>  
            <tr>  
                <th>Tên Phim</th>  
                <th>Thể Loại</th>  
                <th>Thời Lượng</th>  
                <th>Đạo Diễn</th>  
                <th>Ngày Khởi Chiếu</th>  
                <th>Mô Tả</th>  
                <th>Diễn Viên</th>  
                <th>Ảnh Phim</th>
                <th>Trạng thái</th>  
                <th>Sửa</th>  
                <th>Xóa</th>  
            </tr>  
        </thead>  
        <tbody>  
            //Hiển thị danh sách phim
            @foreach ($phims as $phim)  
                <tr>  
                    <td>{{ $phim->TENPHIM }}</td>  
                    <td>{{ $phim->theloai ? $phim->theloai->TENTHELOAI : 'Không có thể loại' }}</td>  
                    <td>{{ $phim->THOILUONG }}</td>  
                    <td>{{ $phim->DAODIEN }}</td>  
                    <td>{{ $phim->NAMPH }}</td>  
                    <td>{{ $phim->DESCRIP }}</td>  
                    <td>{{ $phim->DIENVIEN }}</td>  
                    <td><img src="{{ asset('images/'.$phim->POSTER) }}" alt="{{ $phim->TENPHIM }}" style="width: 100px;"></td>  
                    <td>{{ $phim->status == 0 ? 'Active' : 'Inactive' }}</td>  
                    <td><a href="{{ route('phim.edit', $phim->IDPHIM) }}">Sửa</a></td>  
                    <td>
                        <form method="POST" action="{{ route('phim.destroy', $phim->IDPHIM) }}" class="delete-form">  
                            @csrf  
                            @method('DELETE')  
                            <button type="submit" class="btn-delete" data-id="{{ $phim->IDPHIM }}">Xóa</button>  
                        </form>  
                    </td>
                </tr>  
            @endforeach  
        </tbody>  
    </table>
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
                    if (confirm('Bạn có chắc muốn xóa phim này không?')) {
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
