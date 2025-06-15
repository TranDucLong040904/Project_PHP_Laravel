<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phim</title>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>
    <div class="sidebar" id="sidebar">
        <button class="closebtn" onclick="closeNav()">Close</button>
        <div class="user-info">
            <img src="images/admin.png" alt="">
            <p>Hi, Thang!</p>
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
            <li><a href="{{ route('thongke.index') }}">Thống kê doanh thu</a></li>
        </ul>
    </div>

    <button class="openbtn" onclick="openNav()">&#9776; Open Sidebar</button>
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
    <a href="{{ route('phim.show') }}">Kich Hoạt</a>
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
            @foreach ($phims as $phim)  
                <tr>  
                    <td>{{ $phim->TENPHIM }}</td>  
                    <td>{{ $phim->theloai ? $phim->theloai->TENTHELOAI : 'Không có thể loại' }}</td>  
                    <td>{{ $phim->THOILUONG }}</td>  
                    <td>{{ $phim->DAODIEN }}</td>  
                    <td>{{ $phim->NAMPH }}</td>  
                    <td>{{ $phim->DESCRIP }}</td>  
                    <td>{{ $phim->DIENVIEN }}</td>  
                    <td>  
                        <img src="{{ asset('images/'.$phim->POSTER) }}" alt="{{ $phim->TENPHIM }}" style="width: 100px; height: auto;">  
                    </td>  
                    <td>{{ $phim->status == 0 ? 'Active' : 'Inactive'}}</td>  
                    <td>
                        <a href="{{ route('phim.edit', $phim->IDPHIM) }}">Sửa</a>
                    </td>
                    <td>  
                        <form method="POST" action="{{ route('phim.destroy', $phim->IDPHIM) }}" class="delete-form">  
                            @csrf  
                            @method('DELETE')  
                            <button type="submit" class="btn-delete" data-id="{{ $phim->IDPHIM }}">  
                                Xóa  
                            </button>  
                        </form>  
                    </td>
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
</body>  

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                const button = event.submitter; // Nút đã kích hoạt form submission
                const hasShowtime = button.getAttribute('data-has-showtime') === 'true';
                const row = form.closest('tr'); // Tìm dòng <tr> chứa form

                if (hasShowtime) {
                    // Nếu phim còn lịch chiếu, ngăn gửi form và hiển thị thông báo
                    event.preventDefault(); // Ngăn gửi form
                    alert('Phim vẫn còn lịch chiếu, không thể xóa.');
                } else {
                    // Nếu không có lịch chiếu, cho phép gửi form và ẩn dòng
                    if (confirm('Bạn có chắc muốn xóa phim này không?')) {
                        row.style.display = 'none'; // Ẩn dòng phim
                        form.submit(); // Tiến hành gửi form
                    } else {
                        event.preventDefault(); // Nếu người dùng hủy, ngừng gửi form
                    }
                }
            });
        });
    });
</script>
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
</body>
</html>