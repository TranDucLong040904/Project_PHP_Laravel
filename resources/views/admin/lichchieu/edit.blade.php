<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa lịch chiếu</title>
    <link rel="stylesheet" href="{{asset('css/edit.css')}}">

</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Chỉnh sửa Lịch Chiếu</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('lichchieu.update', $lichChieu->IDLICHCHIEU) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="IDPHIM">Phim</label>
            <select name="IDPHIM" id="IDPHIM" class="form-control" required>
                @foreach ($movies as $movie)
                    <option value="{{ $movie->IDPHIM }}" 
                        {{ $movie->IDPHIM == $lichChieu->IDPHIM ? 'selected' : '' }}>
                        {{ $movie->TENPHIM }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="XUATCHIEU">Xuất Chiếu</label>
            <input type="datetime-local" name="XUATCHIEU" id="XUATCHIEU" class="form-control" 
                value="{{ \Carbon\Carbon::parse($lichChieu->XUATCHIEU)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <label for="IDPHONGCHIEU">Phòng Chiếu</label>
            <select name="IDPHONGCHIEU" id="IDPHONGCHIEU" class="form-control" required>
                @foreach ($rooms as $room)
                    <option value="{{ $room->IDPHONGCHIEU }}" 
                        {{ $room->IDPHONGCHIEU == $lichChieu->IDPHONGCHIEU ? 'selected' : '' }}>
                        {{ $room->TENPHONGCHIEU }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Trạng Thái</label>
            <select name="status" id="status" class="form-control" required>
                <option value="1" {{ $lichChieu->status == 1 ? 'selected' : '' }}>Inactive</option>
                <option value="0" {{ $lichChieu->status == 0 ? 'selected' : '' }}>Active</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('lichchieu.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>