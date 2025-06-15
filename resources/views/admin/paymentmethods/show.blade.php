<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương thức thanh toán</title>
    <link rel="stylesheet" href="{{asset('css/show.css')}}">

</head>
<body>
<div class="container">  
    <h1>Danh sách phương thức thanh toán</h1>  
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif 
    @if($paymentMethods->isEmpty())  
        <div class="alert alert-warning">Không có phương thức thanh toán nào hợp tác.</div>  
    @else  
        <table class="table" border = 1>  
            <thead>  
                <tr>  
                    <th>Phương Thức Thanh Toán</th>  
                    <th>Trạng Thái</th> 
                    <th>Kích Hoạt</th> 
                </tr>  
            </thead>  
            <tbody>  
                @foreach ($paymentMethods as $paymentMethod)  
                <tr>  
                    <td>{{ $paymentMethod->PAYMENTMETHOD }}</td>  
                    <td>{{ $paymentMethod->status_label }}</td> <!-- Hiển thị trạng thái -->  
                    <td>  
                        <form method="POST" action="{{ route('methods.kichHoat', $paymentMethod->id) }}" class="delete-form">  
                            @csrf  
                            @method('DELETE')  
                            <button type="submit" class="btn-delete" data-id="{{ $paymentMethod->id }}">  
                                Kích Hoạt  
                            </button>  
                        </form>  
                    </td>
                </tr>  
                @endforeach  
            </tbody>  
        </table>  

    @endif  
    <a href="{{ route('methods.index') }}" class="btn btn-success">Quay lại</a>

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
                    alert('Phim vẫn còn lịch chiếu, không thể xóa.');
                } else {
                    // Nếu không có lịch chiếu, cho phép gửi form và ẩn dòng
                    if (confirm('Bạn có chắc muốn kích hoạt phương thức thanh toán này không?')) {
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