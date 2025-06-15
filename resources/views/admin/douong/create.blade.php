<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Thêm mới đồ uống</title>  
    <link rel="stylesheet" href="{{asset('css/create.css')}}">
</head>  
<body>  
    <h1>Thêm mới đồ uống</h1>  

    @if ($errors->any())  
        <div style="color: red;">  
            <ul>  
                @foreach ($errors->all() as $error)  
                    <li>{{ $error }}</li>  
                @endforeach  
            </ul>  
        </div>  
    @endif  

    <form action="{{ route('douong.store') }}" method="POST" enctype="multipart/form-data">  
        @csrf  
        <label for="TENDOUONG">Tên đồ uống:</label>  
        <input type="text" id="TENDOUONG" name="TENDOUONG" required><br>  

        <div>  
            <label for="IMAGE">Hình Ảnh</label>
            <input type="text" name="IMAGE" id="IMAGE" required >  
        </div>  

        <label for="MOTA">Mô tả:</label>  
        <textarea id="MOTA" name="MOTA"></textarea><br>  

        <label for="DONGIA">Đơn giá:</label>  
        <input type="number" id="DONGIA" name="DONGIA" required><br>  

        <label for="SOLUONG">Số lượng:</label>  
        <input type="number" id="SOLUONG" name="SOLUONG" required><br>  

        <label for="status">Trạng thái:</label>  
        <select id="status" name="status" required>  
            <option value="0">Active</option>  
            <option value="1">Inactive</option>  
        </select><br> 
        <br> 

        <button type="submit">Thêm mới</button>  
        <a href="{{ route('douong.index') }}">Quay lại</a>  
        
    </form>  

</body>  
</html>