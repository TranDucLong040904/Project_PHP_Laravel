<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vé</title>
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
        <h1>Danh Sách Bill Vé</h1> 
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('ve.create') }}" class="btn btn-success mb-3">Thêm Mới Bill Vé</a>
                         
        <table class="table">  
    <thead>  
        <tr>  
            <th>ID Bill Vé</th>  
            <th>ID Ghế</th>  
            <th>ID Phòng Chiếu</th>  
            <th>ID Lịch Chiếu</th>  
            <th>Đơn Giá</th>  
            <th>Trạng Thái</th>  
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>  
    </thead>  
    <tbody>  
        @foreach($ves as $ve)  
            <tr>  
                <td>{{ $ve->IDBILL_VE }}</td>  
                <td>{{ $ve->IDGHE }}</td>  
                <td>{{ $ve->IDPHONGCHIEU }}</td>  
                <td>{{ $ve->IDLICHCHIEU }}</td>  
                <td>{{ $ve->DONGIA }}</td>  
                <td>{{ $ve->status }}</td>
                <td>  
                    <a href="{{ route('ve.edit', $ve->IDVE) }}" class="btn btn-primary">Sửa</a>  
                </td>  
                <td>
                    <form action="{{ route('ve.destroy', $ve->IDVE) }}" method="POST" style="display:inline;">  
                        @csrf  
                        @method('DELETE')  
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</button>  
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