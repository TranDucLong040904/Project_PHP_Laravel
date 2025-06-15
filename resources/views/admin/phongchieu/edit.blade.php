<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Sửa Phòng Chiếu</title>  
    <link rel="stylesheet" href="{{asset('css/edit.css')}}">

</head>  
<body>  
    <div class="container mt-5">  
        <h2>Sửa Phòng Chiếu</h2>  
        
        @if ($errors->any())  
            <div class="alert alert-danger">  
                <ul>  
                    @foreach ($errors->all() as $error)  
                        <li>{{ $error }}</li>  
                    @endforeach  
                </ul>  
            </div>  
        @endif  

        <form action="{{ route('phongchieu.update', $phongChieu->IDPHONGCHIEU) }}" method="POST">  
            @csrf  
            @method('POST') <!-- Nếu bạn đang xử lý HTTP POST -->  
            
            <div class="form-group">  
                <label for="TENPHONGCHIEU">Tên Phòng Chiếu</label>  
                <input type="text" class="form-control" id="TENPHONGCHIEU" name="TENPHONGCHIEU" value="{{ old('TENPHONGCHIEU', $phongChieu->TENPHONGCHIEU) }}" required>  
            </div>  

            <button type="submit" class="btn btn-primary">Cập Nhật</button>  
            <a href="{{ route('phongchieu.index') }}" class="btn btn-secondary">Quay Lại</a>  
        </form>
    </div>  
</body>  
</html>