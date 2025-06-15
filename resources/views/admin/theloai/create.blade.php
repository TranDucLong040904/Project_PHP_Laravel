<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thể loại</title>
    <link rel="stylesheet" href="{{asset('css/create.css')}}"> 

</head>
<body>
    <div class="container mt-5">
        <h2>Thêm Mới Thể Loại</h2>

        <form action="{{ route('theloai.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="TENTHELOAI" class="form-label">Tên Thể Loại</label>
                <input type="text" class="form-control" id="TENTHELOAI" name="TENTHELOAI" required>
            </div>

            <button type="submit" class="btn btn-primary">Thêm Mới</button>
            <button type="" class="btn btn-primary"><a href="{{ route('theloai.index') }}">Cancel</a></button>
        </form>
    </div>
</body>
</html>