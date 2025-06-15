<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoá đơn</title>
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
            <li><a href="phim.html">Quản lý phim</a></li>
            <li><a href="lichchieuphim.html">Quản lý lịch chiếu phim</a></li>
            <li><a href="phongchieuphim.html">Quản lý phòng chiếu phim</a></li>
            <li><a href="douong.html">Quản lý đồ uống</a></li>
            <li><a href="user.html">Quản lý tài khoản khách hàng</a></li>
        </ul>
    </div>

    <button class="openbtn" onclick="openNav()">&#9776; Open Sidebar</button>
    <div class="container mt-5">  
        <h1>Danh sách Hóa Đơn Vé</h1> 
        @if(session('success'))  
            <div class="alert alert-success">  
                {{ session('success') }}  
            </div>  
        @endif  
        <a href="{{ route('bills.create') }}">Thêm Mới</a>
        <table class="table">  
            <thead>  
                <tr>   
                    <th>Tên Người Dùng</th>  
                    <th>Đơn Giá</th>  
                    <th>Ngày Tạo</th>  
                    <th>Phương Thức Thanh Toán</th>
                    <th>Sửa</th>  
                </tr>  
            </thead>  
            <tbody>  
                @foreach($bills as $bill)  
                <tr>   
                    <td>{{ $bill->name }}</td>  
                    <td>{{ $bill->DONGIA }}</td>  
                    <td>{{ $bill->NGAYTAO }}</td>  
                    <td>{{ $bill->payment ? $bill->payment->PAYMENTMETHOD : 'Không tìm thấy' }}</td>  
                    <td>  
                        <a href="{{ route('bills.edit', $bill->IDBILL_VE) }}" class="btn btn-warning btn-sm">Sửa</a>  
                    </td> 
                    <td>
                        <form action="{{ route('bills.destroy', $bill->IDBILL_VE) }}" method="POST" style="display:inline;">  
                            @csrf  
                            @method('DELETE')  
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa hóa đơn này không?');">Xóa</button>  
                        </form> 
                    </td>
                </tr>  
                @endforeach  
            </tbody>  
        </table>  
    </div>  
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