<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Sửa Đồ Uống</title>  
    <link rel="stylesheet" href="{{asset('css/edit.css')}}">

</head>  
<body>  
    <h1>Sửa Đồ Uống</h1>  

    @if ($errors->any())  
        <div>  
            <ul>  
                @foreach ($errors->all() as $error)  
                    <li>{{ $error }}</li>  
                @endforeach  
            </ul>  
        </div>  
    @endif  

    <form action="{{ route('douong.update', $drink->IDDOUONG) }}" method="POST">  
        @csrf  
        @method('PUT')  

        <div class="form-group">  
            <label for="TENDOUONG">Tên Đồ Uống:</label>  
            <input type="text" class="form-control" id="TENDOUONG" name="TENDOUONG" value="{{ old('TENDOUONG', $drink->TENDOUONG) }}" required>  
        </div>  

        <div class="form-group">  
            <label for="IMAGE">Tên hình ảnh:</label>
            <input type="text" name="IMAGE" id="IMAGE" value="{{ old('IMAGE', basename($drink->IMAGE)) }}">  
        </div>  

        <div class="form-group">  
            <label for="MOTA">Mô Tả:</label>  
            <textarea class="form-control" id="MOTA" name="MOTA">{{ old('MOTA', $drink->MOTA) }}</textarea>  
        </div>  

        <div class="form-group">  
            <label for="DONGIA">Đơn Giá:</label>  
            <input type="number" class="form-control" id="DONGIA" name="DONGIA" value="{{ old('DONGIA', $drink->DONGIA) }}" required>  
        </div>  

        <div class="form-group">  
            <label for="SOLUONG">Số Lượng:</label>  
            <input type="number" class="form-control" id="SOLUONG" name="SOLUONG" value="{{ old('SOLUONG', $drink->SOLUONG) }}" required>  
        </div>  

        <div class="form-group">
            <label for="status" class="form-label"><strong>Status:</strong></label>
            <select name="status" class="form-control" id="status">
                <option value="0" {{ old('status', $drink->status) == 0 ? 'selected' : '' }}>Active</option>
                <option value="1" {{ old('status', $drink->status) == 1 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit">Cập Nhật Đồ Uống</button>  
        <a href="{{route('douong.index')}}">Quay lại</a>
    </form>  
</body>  
</html>