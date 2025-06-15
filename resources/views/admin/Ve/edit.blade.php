<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bill vé</title>
    <link rel="stylesheet" href="{{asset('css/edit.css')}}">

</head>
<body>
<h1>Sửa Vé</h1>  

<form action="{{ route('ve.update', $ve->IDVE) }}" method="POST">  
    @csrf  
    @method('PUT')
    <div class="form-group">  
        <label for="IDGHE">ID Ghế</label>  
        <select name="IDGHE[]" id="IDGHE" multiple>  
            <option value="" disabled>Chọn ghế</option>  
            <!-- Giả sử bạn có một mảng ghế có sẵn -->  
            @foreach ($ghes as $ghe)  
                <option value="{{ $ghe->IDGHE }}" {{ in_array($ghe, $idGheArray) ? 'selected' : '' }}>{{ $ghe }}</option>  
            @endforeach  
        </select>  
    </div>  

    <div class="form-group">  
        <label for="IDPHONGCHIEU">ID Phòng Chiếu</label>  
        <input type="text" name="IDPHONGCHIEU" id="IDPHONGCHIEU" value="{{ $ve->IDPHONGCHIEU }}">  
    </div> 
    
    <div class="form-group">  
        <label for="IDBILL_VE">ID Bill Vé</label>  
        <input type="text" name="IDBILL_VE" id="IDBILL_VE" value="{{ $ve->IDBILL_VE }}">  
    </div> 

    <div class="form-group">  
        <label for="IDLICHCHIEU">ID Lịch Chiếu</label>  
        <input type="text" name="IDLICHCHIEU" id="IDLICHCHIEU" value="{{ $ve->IDLICHCHIEU }}">  
    </div>  

    <div class="form-group">  
        <label for="DONGIA">Đơn Giá</label>  
        <input type="number" name="DONGIA" id="DONGIA" value="{{ $ve->DONGIA }}">  
    </div>  

    <div class="form-group">  
        <label for="status">Trạng Thái</label>  
        <input type="text" name="status" id="status" value="{{ $ve->status }}">  
    </div>  

    <button type="submit">Cập nhật</button>  
</form>
</body>
</html>