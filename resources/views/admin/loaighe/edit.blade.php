<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Sửa Loại Ghế</title>  
    <link rel="stylesheet" href="{{asset('css/edit.css')}}">
</head>  
<body>  
    <h1>Sửa Loại Ghế</h1>  

    <form action="{{ route('loaighe.update', $ghe->IDLOAIGHE) }}" method="POST">  
        @csrf  
        @method('PUT')  
        <label for="DONGIA">Đơn Giá:</label>  
        <input type="number" name="DONGIA" id="DONGIA" value="{{ $ghe->DONGIA }}" required>  
        <br>   

        <button type="submit">Cập Nhật</button>  
        <a href="{{ route('loaighe.index') }}">Quay lại</a>  
    </form>  

</body>  
</html>