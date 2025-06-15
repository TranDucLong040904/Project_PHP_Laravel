<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa phương thức thanh toán</title>
    <link rel="stylesheet" href="{{asset('css/edit.css')}}">
</head>
<body>
<div class="container">  
    <h1>Sửa Phương Thức Thanh Toán</h1>  

    @if ($errors->any())  
        <div class="alert alert-danger">  
            <ul>  
                @foreach ($errors->all() as $error)  
                    <li>{{ $error }}</li>  
                @endforeach  
            </ul>  
        </div>  
    @endif  

    <form action="{{ route('methods.update', $paymentMethod->id) }}" method="POST">  
        @csrf  
        @method('PUT')  
        <div class="form-group">  
            <label for="PAYMENTMETHOD">Phương Thức Thanh Toán:</label>  
            <input type="text" id="PAYMENTMETHOD" name="PAYMENTMETHOD" class="form-control" value="{{ $paymentMethod->PAYMENTMETHOD }}" required>  
        </div>  
        <div class="form-group">  
            <label for="STATUS">Trạng Thái:</label>  
            <select id="STATUS" name="STATUS" class="form-control" required>  
                <option value="0" {{ $paymentMethod->STATUS == 0 ? 'selected' : '' }}>Active</option>  
                <option value="1" {{ $paymentMethod->STATUS == 1 ? 'selected' : '' }}>Inactive</option>  
            </select>  
        </div>  
        <button type="submit" class="btn btn-primary">Cập nhật</button>  
        <a href="{{ route('methods.index') }}" class="btn btn-secondary">Quay lại</a>  
    </form>  
</div>
</body>
</html>