<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Lịch Chiếu</title>
    <link rel="stylesheet" href="{{asset('css/show.css')}}">

</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Danh Sách Lịch Chiếu</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tên Phim</th>
                    <th>Xuất Chiếu</th>
                    <th>Tên Phòng Chiếu</th>
                    <th>Status</th>
                    <th>Kích Hoạt</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lichChieus as $lichChieu)
                    <tr>
                        <td>{{ $lichChieu->movie->TENPHIM }}</td>
                        <td>{{ $lichChieu->XUATCHIEU }}</td>
                        <td>{{ $lichChieu->room->TENPHONGCHIEU }}</td>
                        <td>{{ $lichChieu->status == 0 ? 'Active' : 'Inactive' }}</td>
                        <td>  
                            <form method="POST" action="{{ route('lichchieu.kichHoat', $lichChieu->IDLICHCHIEU) }}" class="delete-form">  
                                @csrf  
                                @method('DELETE')  
                                <button type="submit" class="btn-delete" data-id="{{ $lichChieu->IDLICHCHIEU }}" >
                                    Kích Hoạt  
                                </button>  
                            </form>  
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Không có lịch chiếu nào được hiển thị</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('lichchieu.index') }}" class="btn btn-primary">Quay lại</a>
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
                    if (confirm('Bạn có chắc muốn xóa lịch chiếu này không?')) {
                        row.style.display = 'none'; 
                        form.submit(); 
                    } else {
                        event.preventDefault(); // Nếu người dùng hủy, ngừng gửi form
                    }
                }
            });
        });
    });
</script>
</html>
