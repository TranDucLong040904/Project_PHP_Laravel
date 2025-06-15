<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thể loại</title>
    <link rel="stylesheet" href="{{asset('css/edit.css')}}">

</head>
<body>
    <div class="container mt-5">
        <h2>Sửa Thể Loại</h2>

        <form action="{{ route('theloai.update', $category->IDTHELOAI) }}" method="POST">
            @csrf
            @method('PUT') <!-- Laravel yêu cầu _method PUT cho update -->

            <div class="mb-3">
                <label for="TENTHELOAI" class="form-label">Tên Thể Loại</label>
                <input type="text" class="form-control" id="TENTHELOAI" name="TENTHELOAI" value="{{ $category->TENTHELOAI }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('theloai.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>