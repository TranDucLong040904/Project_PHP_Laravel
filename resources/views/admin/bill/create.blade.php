<!-- resources/views/billve/create.blade.php -->  
<!DOCTYPE html>  
<html lang="vi">  
<head>  
    <meta charset="UTF-8">  
    <title>Thêm Hóa Đơn Vé</title>  
    <link rel="stylesheet" href="{{asset('css/create.css')}}"> 

</head>  
<body>  
    <div class="container mt-5">  
        <h1>Thêm Hóa Đơn Vé</h1>  

        @if ($errors->any())  
            <div class="alert alert-danger">  
                <ul>  
                    @foreach ($errors->all() as $error)  
                        <li>{{ $error }}</li>  
                    @endforeach  
                </ul>  
            </div>  
        @endif  

        <form method="POST" action="{{ route('bills.store') }}">  
            @csrf  
            <div class="form-group">  
                <label for="name">Tên Người Dùng:</label>  
                <input type="text" name="name" id="name" class="form-control" required>  
            </div>  
            <div class="form-group">  
                <label for="DONGIA">Đơn Giá:</label>  
                <input type="number" name="DONGIA" id="DONGIA" class="form-control" required>  
            </div>  
            <div class="form-group">  
            <label for="PAYMENTID">Phương Thức Thanh Toán:</label>  
            <select name="PAYMENTID" id="PAYMENTID" class="form-control" required>  
                <option value="">Chọn phương thức thanh toán</option>  
                @foreach ($payments as $payment)  
                    <option value="{{ $payment->id }}">{{ $payment->PAYMENTMETHOD }}</option>  
                @endforeach   
            </select>   
            </div>  
            <button type="submit" class="btn btn-primary">Thêm Hóa Đơn</button>  
            <a href="{{ route('bills.index') }}" class="btn btn-secondary">Quay Lại</a>  
        </form>  
    </div>  
</body>  
</html>