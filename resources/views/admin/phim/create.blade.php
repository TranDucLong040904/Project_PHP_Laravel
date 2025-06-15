
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phim</title>
    <link rel="stylesheet" href="{{asset('css/create.css')}}"> 

</head>
<body> 
    <h2>Thêm Phim Mới</h2>
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<form action="{{ route('phim.store') }}" method="POST" enctype="multipart/form-data">  
    @csrf  
    <div>  
        <label for="TENPHIM">Tên Phim:</label>  
        <input type="text" name="TENPHIM" id="TENPHIM" required>  
    </div>  

    <div>  
        <label for="IDTHELOAI">Thể Loại:</label>  
        <select name="IDTHELOAI" id="IDTHELOAI" required>  
            <option value="">Chọn thể loại</option>  
            @foreach ($theloais as $theloai)  
                <option value="{{ $theloai->IDTHELOAI }}">{{ $theloai->TENTHELOAI }}</option>  
            @endforeach  
        </select>  
    </div>  

    <div>  
        <label for="THOILUONG">Thời Lượng:</label>  
        <input type="number" name="THOILUONG" id="THOILUONG">  
    </div>  

    <div>  
        <label for="DAODIEN">Đạo Diễn:</label>  
        <input type="text" name="DAODIEN" id="DAODIEN">  
    </div>  

    <div>  
        <label for="NAMPH" class="form-label">Ngày Khởi Chiếu</label>
        <input type="date" name="NAMPH" id="NAMPH" class="form-control" required> 
    </div>  

    <div>  
        <label for="DESCRIP">Mô Tả:</label>  
        <textarea name="DESCRIP" id="DESCRIP"></textarea>  
    </div>  

    <div>  
        <label for="DIENVIEN">Diễn Viên:</label>  
        <input type="text" name="DIENVIEN" id="DIENVIEN">  
    </div>  

    <div>  
        <label for="POSTER">Ảnh Phim:</label>  
        <input type="file" name="POSTER" id="POSTER" accept="image/*">  
    </div>  

    <div>  
    <span>Trạng Thái:</span><br>  
    <select name="status" id="status">  
            <option value="Đang chiếu" selected>Active</option>  
            <option value="Ngừng chiếu">Inactive</option>  
        </select>  
    </div> 

    <button type="submit">Thêm Phim</button>  
    <button type=""><a href="{{ route('phim.index') }}">Quay lại</a></button>  
</form>
</body>
</html>