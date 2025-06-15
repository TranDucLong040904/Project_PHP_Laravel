<!-- resources/views/phim/index.blade.php -->  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Danh Sách Phim</title>  
    <link rel="stylesheet" href="{{asset('css/show.css')}}">
</head>  
<body>  
    <h1>Danh Sách Phim</h1> 
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif 
    <table border="1">  
        <thead>  
            <tr>  
                <th>Tên Phim</th>  
                <th>Thể Loại</th>  
                <th>Thời Lượng</th>  
                <th>Đạo Diễn</th>  
                <th>Năm Phát Hành</th>  
                <th>Mô Tả</th>  
                <th>Diễn Viên</th>  
                <th>Ảnh Phim</th>
                <th>Trạng thái</th>  
                <th>Kích Hoạt</th>  
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
                        <form method="POST" action="{{ route('phim.kichHoat', $phim->IDPHIM) }}" class="delete-form">  
                            @csrf  
                            @method('DELETE')  
                            <button type="submit" class="btn-delete" data-id="{{ $phim->IDPHIM }}" >  
                                Kích Hoạt  
                            </button>  
                        </form>  
                    </td>
                </tr>  
            @endforeach  
        </tbody>  
    </table>
    <a href="{{ route('phim.index') }}">Quay lại</a>  
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
                    if (confirm('Bạn có chắc muốn kích hoạt phim này không?')) {
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

</html>