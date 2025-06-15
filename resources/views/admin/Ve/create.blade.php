<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Thêm Mới Bill Vé</title>  
    <link rel="stylesheet" href="{{asset('css/create.css')}}"> 
</head>  
<body>  
    <div class="container mt-5">  
        <h1>Thêm Mới Bill Vé</h1>  

        @if (session('success'))  
            <div class="alert alert-success">{{ session('success') }}</div>  
        @endif  

        <form action="{{ route('ve.store') }}" method="POST">  
            @csrf  
            <div class="form-group">  
            <label for="IDGHE">Chọn Ghế</label>  
                <select id="IDGHE" name="IDGHE[]" class="form-control" multiple required>  
                    @foreach($ghes as $ghe)  
                        <option value="{{ $ghe->IDGHE }}">{{ $ghe->IDGHE }}</option>  
                    @endforeach  
                </select>  
                <small class="form-text text-muted">Giữ phím Ctrl (Windows) hoặc Command (Mac) để chọn nhiều ghế.</small>   
            </div>  

            <div class="form-group">  
                <label for="IDPHONGCHIEU">Chọn Phòng Chiếu</label>  
                <select id="IDPHONGCHIEU" name="IDPHONGCHIEU" class="form-control" required>  
                    <option value="">Chọn Phòng Chiếu</option>  
                    @foreach($phongs as $phong)  
                        <option value="{{ $phong->IDPHONGCHIEU }}">{{ $phong->IDPHONGCHIEU }}</option>  
                    @endforeach  
                </select>  
            </div>  

            <div class="form-group">  
                <label for="IDBILL_VE">Chọn bill vé</label>  
                <select id="IDBILL_VE" name="IDBILL_VE" class="form-control" required>  
                    <option value="">Chọn BILL VÉ</option>  
                    @foreach($bills as $bill)  
                        <option value="{{ $bill->IDBILL_VE }}">{{ $bill->IDBILL_VE }}</option>  
                    @endforeach  
                </select>  
            </div>  

            <div class="form-group">  
                <label for="IDLICHCHIEU">Chọn Lịch Chiếu</label>  
                <select id="IDLICHCHIEU" name="IDLICHCHIEU" class="form-control" required>  
                    <option value="">Chọn Lịch Chiếu</option>  
                    @foreach($lichChieus as $lichChieu)  
                        <option value="{{ $lichChieu->IDLICHCHIEU }}">{{ $lichChieu->IDLICHCHIEU }}</option>  
                    @endforeach  
                </select>  
            </div>  

            <div class="form-group">  
                <label for="DONGIA">Đơn Giá</label>  
                <input type="number" id="DONGIA" name="DONGIA" class="form-control" required>  
            </div>  

            <div class="form-group">  
                <label for="status">Trạng Thái:</label><br>  
                <div>  
                    <input type="radio" id="active" name="status" value="0" checked>  
                    <label for="active">Active</label>  
                </div>  
                <div>  
                    <input type="radio" id="inactive" name="status" value="1">  
                    <label for="inactive">Inactive</label>  
                </div>  
            </div>  

            <button type="submit" class="btn btn-primary">Thêm Mới</button>  
        </form>  
    </div>  
</body>  
</html>