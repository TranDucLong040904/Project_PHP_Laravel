<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Danh Sách Phòng Chiếu</title>  
    <link rel="stylesheet" href="{{asset('css/show.css')}}">

</head>  
<body>  
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
        <table class="table">  
            <thead>  
                <tr>   
                    <th>Tên Phòng Chiếu</th>  
                    <th>Kích Hoạt</th>
                </tr>  
            </thead>  
            <tbody>  
                @foreach($phongChieus as $phongChieu)  
                    <tr>   
                        <td>{{ $phongChieu->TENPHONGCHIEU }}</td>
                        <td>
                            <form method="POST" action="{{ route('phongchieu.kichHoat', $phongChieu->IDPHONGCHIEU) }}" class="delete-form">  
                                @csrf  
                                @method('DELETE')  
                                <button type="submit" class="btn-delete" data-id="{{ $phongChieu->IDPHONGCHIEU }}">  
                                    Kích Hoạt  
                                </button>  
                            </form>

                        </td>
                    </tr>  
                @endforeach  
            </tbody>  
        </table>  
        <a href="{{route('phongchieu.index')}}" class="btn btn-success">Quay lại</a>
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
                    if (confirm('Bạn có chắc muốn kích hoạt phòng chiếu này không?')) {
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