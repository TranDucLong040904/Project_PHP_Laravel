<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Lịch Chiếu</title>    
    <link rel="stylesheet" href="{{asset('css/create.css')}}"> 

</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Thêm Lịch Chiếu</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lichchieu.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="IDPHIM" class="form-label">Tên Phim</label>
                <select name="IDPHIM" id="IDPHIM" class="form-control" required>
                    <option value="">Chọn Phim</option>
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->IDPHIM }}">{{ $movie->TENPHIM }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="XUATCHIEU" class="form-label">Xuất Chiếu</label>
                <input type="datetime-local" name="XUATCHIEU" id="XUATCHIEU" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="IDPHONGCHIEU" class="form-label">Phòng Chiếu</label>
                <select name="IDPHONGCHIEU" id="IDPHONGCHIEU" class="form-control" required>
                    <option value="">Chọn Phòng Chiếu</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->IDPHONGCHIEU }}">{{ $room->TENPHONGCHIEU }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Trạng Thái</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="0">Active</option>
                    <option value="1">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <button class="btn btn-primary"><a href="{{route('lichchieu.index')}}">Quay lại</a></button>
        </form>

    </div>
</body>
</html>
