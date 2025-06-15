<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<style>
body {  
    font-family: Arial, sans-serif;  
    background-color: #f9f9f9;  
    margin: 0;  
    padding: 20px;  
}  

form {  
    background-color: #fff;  
    border: 1px solid #ccc;  
    border-radius: 5px;  
    padding: 20px;  
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
    max-width: 800px; /* Chiều rộng tối đa của form */  
    margin: auto;   
}  

.form-row {  
    display: flex; /* Sử dụng Flexbox để sắp xếp các trường theo hàng */  
    align-items: center; /* Căn giữa các mục theo chiều dọc */  
    margin-bottom: 15px; /* Khoảng cách giữa các hàng */  
}  

label {  
    margin-right: 10px; /* Khoảng cách giữa label và select */  
    white-space: nowrap; /* Ngăn các label xuống dòng */  
    width: 120px; /* Chiều rộng cố định cho label */  
}  

select {  
    flex: 1; /* Cho select chiếm không gian còn lại */  
    padding: 10px;  
    border: 1px solid #ccc;  
    border-radius: 4px;  
    font-size: 16px;  
}  

button {  
    background-color: #007bff;  
    color: white;  
    border: none;  
    border-radius: 4px;  
    padding: 10px 15px;  
    font-size: 16px;  
    cursor: pointer;  
    margin-top: 20px; /* Khoảng cách trên nút */  
}  

button:hover {  
    background-color: #0056b3;  
}
</style>
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
    <h1>Thống Kê Hóa Đơn và Lọc Vé</h1>

    <!-- Form thống kê -->
    <form method="GET" action="{{ route('thongke.index') }}">
        <div class="form-row"> 
            <label for="month">Month:</label>
            <select name="month" id="month">
                <option value="0" {{ $month == 0 ? 'selected' : '' }}>Tất cả các tháng</option> <!-- Tùy chọn "Tất cả các tháng" -->
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ $i == old('month', $month) ? 'selected' : '' }}>
                        {{ date("F", mktime(0, 0, 0, $i, 1)) }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="form-row"> 
            <label for="year">Year:</label>
            <select name="year" id="year">
                @for ($i = date('Y') - 5; $i <= date('Y'); $i++)
                    <option value="{{ $i }}" {{ $i == old('year', $year) ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="form-row"> 
            <label for="TENPHIM">Tên Phim:</label>  
            <select name="TENPHIM" id="TENPHIM">  
                <option value="">Chọn phim</option>  
                <option value="all" {{ old('TENPHIM', $movieId) == 'all' ? 'selected' : '' }}>Tất cả</option>  
                @foreach ($movies as $movie)  
                    <option value="{{ $movie->IDPHIM }}" {{ $movie->IDPHIM == old('TENPHIM', $movieId) ? 'selected' : '' }}>  
                        {{ $movie->TENPHIM }}  
                    </option>  
                @endforeach  
            </select> 
        </div>

        <div class="form-row"> 
            <label for="IDDOUONG">Select Drink:</label>  
            <select name="IDDOUONG" id="IDDOUONG">  
                <option value="all" {{ old('IDDOUONG', $drinkId) == 'all' ? 'selected' : '' }}>Tất cả đồ uống</option>  
                @foreach ($drinks as $drink)  
                    <option value="{{ $drink->IDDOUONG }}" {{ $drink->IDDOUONG == old('IDDOUONG', $drinkId) ? 'selected' : '' }}>  
                        {{ $drink->TENDOUONG }}  
                    </option>  
                @endforeach  
            </select> 
        </div>

        <button type="submit">Thống Kê</button>
    </form>

    <hr>

    <!-- Bảng thống kê hóa đơn -->
    <h2>Thống Kê Hóa Đơn cho 
        @if ($month == 0)
            năm {{ $year }}
        @else
            tháng {{ $month }} / {{ $year }}
        @endif
    </h2>
    @if ($bills->isNotEmpty())
        <table border="1">
            <thead>
                <tr>
                    <th>Tên Người Dùng</th>
                    <th>Ngày Tạo</th>
                    <th>Phương Thức Thanh Toán</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $bill)
                    <tr>
                        <td>{{ $bill->user->name ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($bill->NGAYTAO)->format('d/m/Y') }}</td>
                        <td>{{ $bill->payment->PAYMENTMETHOD ?? 'Không tìm thấy' }}</td>
                        <td>{{ number_format($bill->DONGIA, 0, ',', '.') }} VNĐ</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan=3"><strong>Tổng Cộng</strong></td>
                    <td><strong>{{ number_format($total, 0, ',', '.') }} VNĐ</strong></td>
                    <td colspan="2"></td>
                </tr>
            </tbody>
        </table>
    @else
        <p>Không có hóa đơn nào trong tháng {{ $month }}/{{ $year }}.</p>
    @endif

    <hr>

    <!-- Bảng lọc vé theo tên phim -->
    <h2>Kết Quả Lọc Vé Theo Phim</h2>
    @if (!empty($movieId))
    <h3>Kết quả cho: 
        @if ($movieId === 'all')
            Tất cả các phim
        @else
            "{{ $movies->firstWhere('IDPHIM', $movieId)?->TENPHIM ?? 'Phim không tìm thấy' }}"
        @endif
    </h3>
    @endif

    @if (!empty($ves) && $ves->isNotEmpty())
        <table border="1">
            <thead>
                <tr>
                    <th>ID Vé</th>
                    <th>Tên Phim</th>
                    <th>Phòng</th>
                    <th>Ghế</th>
                    <th>Ngày đặt</th>
                    <th>ID Hóa Đơn</th>
                    <th>Đơn Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ves as $ve)
                    <tr>
                        <td>{{ $ve->IDVE }}</td>
                        <td>{{ $ve->lichChieu->movie->TENPHIM ?? 'N/A' }}</td>
                        <td>{{ $ve->phong->TENPHONGCHIEU ?? 'N/A' }}</td>
                        <td>{{ $ve->IDGHE ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($ve->bill->NGAYTAO)->format('d/m/Y') }}</td>
                        <td>{{ $ve->bill->IDBILL_VE ?? 'N/A' }}</td>
                        <td>{{ number_format($ve->DONGIA, 0, ',', '.') }} VNĐ</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6"><strong>Tổng Cộng</strong></td>
                    <td><strong>{{ number_format($Tong, 0, ',', '.') }} VNĐ</strong></td>
                </tr>
            </tbody>
        </table>
    @else
        <p>Không có vé nào được tìm thấy.</p>
    @endif

    <h2>Thống kê theo đồ uống</h2>
    @if (!empty($drinkId))
    <h3>Kết quả cho: 
        @if ($drinkId === 'all')
            Tất cả các loại đồ uống
        @else
            "{{ $douongs->firstWhere('IDDOUONG', $drinkId)?->TENDOUONG ?? 'Đồ uống không tìm thấy' }}"
        @endif
    </h3>
    @endif

    @if (!empty($billDrinkDetails) && $billDrinkDetails->isNotEmpty())
        <table border="1">
            <thead>
                <tr>
                    <th>Tên đồ uống</th>
                    <th>Số lượng</th>
                    <th>Ngày đặt</th>
                    <th>Phương thức thanh toán</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($billDrinkDetails as $billDrinkDetail)
                    <tr>
                        <td>{{ $billDrinkDetail->douong->TENDOUONG ?? 'N/A' }}</td>
                        <td>{{ $billDrinkDetail->SOLUONG }}</td>
                        <td>{{ \Carbon\Carbon::parse($billDrinkDetail->NGAYTAO)->format('d/m/Y') }}</td>
                        <td>{{ $billDrinkDetail->PAYMENTSTATUS ?? 'N/A' }}</td>
                        <td>{{ number_format($billDrinkDetail->DONGIA, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No drink sales found for this filter.</td>
                    </tr>
                @endforelse

                <tr>
                    <td colspan="4"><strong>Tổng Cộng</strong></td>
                    <td><strong>{{ number_format($totalDrink, 0, ',', '.') }} VNĐ</strong></td>
                </tr>
            </tbody>
        </table>
    @else
        <p>Không có chi tiết đồ uống nào được tìm thấy.</p>
    @endif
</body>
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
