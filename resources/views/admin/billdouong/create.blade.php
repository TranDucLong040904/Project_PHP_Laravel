<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hoá đơn đồ uống</title>
    <link rel="stylesheet" href="{{asset('css/create.css')}}"> 

</head>
<body>
<div class="container">  
    <h1>Thêm Đồ Uống</h1>  
    @if (session('success'))  
    <div class="alert alert-success">{{ session('success') }}</div>  
    @endif  
    <form action="{{ route('billdouong.store') }}" method="POST">  
        @csrf  

        <div class="form-group">  
            <label for="id_do_uong">Chọn Đồ Uống</label>  
            <select id="id_do_uong" name="id_do_uong" class="form-control" required>  
                <option value="">Chọn đồ uống</option>  
                @foreach($doUongs as $doUong)  
                    <option value="{{ $doUong->IDDOUONG }}">{{ $doUong->TENDOUONG }}</option>  
                @endforeach  
            </select>  
        </div> 

        <div class="form-group">  
            <label for="soluong">Số Lượng</label>  
            <input type="number" id="soluong" name="soluong" class="form-control" min="1" required>  
        </div>  

        <div class="form-group">  
            <label for="paymentstatus">Chọn Phương Thức Thanh Toán</label>  
            <select id="paymentstatus" name="paymentstatus" class="form-control" required>  
                <option value="">Chọn phương thức thanh toán</option>  
                @foreach($payments as $payment)  
                    <option value="{{ $payment->id }}">{{ $payment->PAYMENTMETHOD }}</option>  
                @endforeach  
            </select>  
        </div>  

        <button type="submit" class="btn btn-primary">Thêm Đồ Uống</button>  
    </form>  
</div> 

<script>  
document.getElementById('id_do_uong').addEventListener('change', function() {  
    var idDoUong = this.value;  
    // Gửi yêu cầu AJAX để lấy đơn giá của đồ uống  
    fetch(`/api/douong/${idDoUong}`)  
        .then(response => response.json())  
        .then(data => {  
            document.getElementById('dongia').value = data.DONGIA;  
        });  
});  
</script>
</body>
</html>