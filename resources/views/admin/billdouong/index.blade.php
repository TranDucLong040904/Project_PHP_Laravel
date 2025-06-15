<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoá đơn đồ uống</title>
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
    <h1>Bill Douong Details</h1>  
    <table border="1">  
        <thead>  
            <tr>  
                <th>Tên Đồ Uống</th>  
                <th>Số Lượng</th>  
                <th>Đơn Giá</th>  
                <th>Ngày Tạo</th>  
                <th>Phương Thức Thanh Toán</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach($billDetails as $detail)  
                <tr>  
                    <td>{{ $detail->douong->TENDOUONG }}</td>  
                    <td>{{ $detail->SOLUONG }}</td>  
                    <td>{{ number_format($detail->DONGIA, 2) }} VNĐ</td>  
                    <td>{{ $detail->NGAYTAO }}</td>  
                    <td>{{ $detail->payment->PAYMENTMETHOD }}</td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
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