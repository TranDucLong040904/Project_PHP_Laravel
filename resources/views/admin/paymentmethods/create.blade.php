<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phương thức thanh toán</title>
    <link rel="stylesheet" href="{{asset('css/create.css')}}"> 

</head>
<body>
<div class="container">  
    <h1>Thêm Phương Thức Thanh Toán Mới</h1>  

    @if ($errors->any())  
        <div class="alert alert-danger">  
            <ul>  
                @foreach ($errors->all() as $error)  
                    <li>{{ $error }}</li>  
                @endforeach  
            </ul>  
        </div>  
    @endif  

    <form action="{{ route('methods.store') }}" method="POST">  
        @csrf  
        <div class="form-group">  
            <label for="PAYMENTMETHOD">Phương Thức Thanh Toán:</label>  
            <input type="text" id="PAYMENTMETHOD" name="PAYMENTMETHOD" class="form-control" required>  
        </div>  
        <div class="form-group">  
            <label for="STATUS">Trạng Thái:</label>  
            <select id="STATUS" name="STATUS" class="form-control" required>  
                <option value="0">Active</option>  
                <option value="1">Inactive</option>  
            </select>  
        </div>  
        <button type="submit" class="btn btn-primary">Thêm mới</button>  
        <a href="{{ route('methods.index') }}" class="btn btn-secondary">Quay lại</a>  
    </form>  
</div> 
</body>
</html>