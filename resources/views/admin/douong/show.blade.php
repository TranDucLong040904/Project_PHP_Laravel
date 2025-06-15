<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Danh sách đồ uống</title> 
    <link rel="stylesheet" href="{{asset('css/show.css')}}">

</head>  
<body>  
    <h1>Danh sách đồ uống</h1>  
    @if(session('success'))  
        <div>  
            {{ session('success') }}  
        </div>  
    @endif 
    <table border = 1>  
        <thead>  
            <tr>  
                <th>Tên Đồ Uống</th>  
                <th>Đơn Giá</th> 
                <th>Số Lượng</th>
                <th>Trạng Thái</th>  
                <th>Xóa</th>
            </tr>  
        </thead>  
        <tbody>  
            @foreach($drinks as $drink)  
                <tr>  
                    <td>{{ $drink->TENDOUONG }}</td>  
                    <td>{{ $drink->DONGIA }}</td>
                    <td>{{ $drink->SOLUONG }}</td>
                    <td>{{ $drink->status == 0 ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <form method="POST" action="{{ route('douong.kichHoat', $drink->IDDOUONG) }}" class="delete-form">  
                            @csrf  
                            @method('DELETE')  
                            <button type="submit" class="btn-delete" data-id="{{ $drink->IDDOUONG }}">  
                                Kích hoạt  
                            </button>  
                        </form>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
    <a href="{{ route('douong.index') }}">Quay lại</a>
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
                    if (confirm('Bạn có chắc muốn kich hoạt loại đồ uống này không?')) {
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