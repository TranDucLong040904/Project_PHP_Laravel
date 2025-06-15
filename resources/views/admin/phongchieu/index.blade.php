<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng chiếu</title>
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
    <div class="container mt-5">  
        <h2>Danh Sách Phòng Chiếu</h2> 
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
        <a href="{{route('phongchieu.create')}}" class="btn btn-success">Thêm Mới</a>
        <a href="{{route('phongchieu.show')}}" class="btn btn-success">Kích Hoạt</a>
        <table class="table">  
            <thead>  
                <tr>   
                    <th>Tên Phòng Chiếu</th>  
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>  
            </thead>  
            <tbody>  
                @foreach($phongChieus as $phongChieu)  
                    <tr>   
                        <td>{{ $phongChieu->TENPHONGCHIEU }}</td> 
                        <td>
                            <a href="{{ route('phongchieu.edit', $phongChieu->IDPHONGCHIEU) }}">Sửa</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('phongchieu.destroy', $phongChieu->IDPHONGCHIEU) }}" class="delete-form">  
                                @csrf  
                                @method('DELETE')  
                                <button type="submit" class="btn-delete" data-id="{{ $phongChieu->IDPHONGCHIEU }}"   
                                        data-has-showtime="{{ $phongChieu->lichChieu->count() > 0 }}">  
                                    Xóa  
                                </button>  
                            </form>

                        </td>
                    </tr>  
                @endforeach  
            </tbody>  
        </table>  
    </div>  
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
                } else {
                    // Nếu không có lịch chiếu, cho phép gửi form và ẩn dòng
                    if (confirm('Bạn có chắc muốn xóa phòng chiếu này không?')) {
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
</html>