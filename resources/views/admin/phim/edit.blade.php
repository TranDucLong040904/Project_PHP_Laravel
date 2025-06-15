<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa phim</title>
    <link rel="stylesheet" href="{{asset('css/edit.css')}}">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Movie</h2>

        <form action="/phim/{{ $movie->IDPHIM }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT"> <!-- Laravel yêu cầu _method PUT cho update -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- CSRF token để bảo vệ form -->

            <!-- Tên phim -->
            <div class="mb-3">
                <label for="TENPHIM" class="form-label"><strong>Name:</strong></label>
                <input 
                    type="text" 
                    name="TENPHIM" 
                    class="form-control" 
                    id="TENPHIM" 
                    value="{{ old('TENPHIM', $movie->TENPHIM) }}" 
                    placeholder="Enter movie name">
            </div>

            <!-- Thể loại -->
            <div class="mb-3">
                <label for="IDTHELOAI" class="form-label"><strong>Category:</strong></label>
                <select name="IDTHELOAI" class="form-control" id="IDTHELOAI">
                    <option value="">Select a category</option>
                    <!-- Loop qua các thể loại phim -->
                    @foreach($categories as $category)
                        <option value="{{ $category->IDTHELOAI }}" 
                            {{ old('IDTHELOAI', $movie->IDTHELOAI) == $category->IDTHELOAI ? 'selected' : '' }}>
                            {{ $category->TENTHELOAI }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Thời lượng -->
            <div class="mb-3">
                <label for="THOILUONG" class="form-label"><strong>Duration:</strong></label>
                <input 
                    type="text" 
                    name="THOILUONG" 
                    class="form-control" 
                    id="THOILUONG" 
                    value="{{ old('THOILUONG', $movie->THOILUONG) }}" 
                    placeholder="Enter movie duration">
            </div>

            <!-- Đạo diễn -->
            <div class="mb-3">
                <label for="DAODIEN" class="form-label"><strong>Director:</strong></label>
                <input 
                    type="text" 
                    name="DAODIEN" 
                    class="form-control" 
                    id="DAODIEN" 
                    value="{{ old('DAODIEN', $movie->DAODIEN) }}" 
                    placeholder="Enter director's name">
            </div>

            <!-- Năm phát hành -->
            <div class="mb-3">
                <label for="NAMPH">Ngày Khởi Chiếu</label>
                <input type="date" name="NAMPH" id="NAMPH" class="form-control" 
                    value="{{ $movie->NAMPH }}" required>
            </div>

            <!-- Mô tả -->
            <div class="mb-3">
                <label for="DESCRIP" class="form-label"><strong>Description:</strong></label>
                <textarea 
                    name="DESCRIP" 
                    class="form-control" 
                    id="DESCRIP" 
                    placeholder="Enter description">{{ old('DESCRIP', $movie->DESCRIP) }}</textarea>
            </div>

            <!-- Diễn viên -->
            <div class="mb-3">
                <label for="DIENVIEN" class="form-label"><strong>Actors:</strong></label>
                <input 
                    type="text" 
                    name="DIENVIEN" 
                    class="form-control" 
                    id="DIENVIEN" 
                    value="{{ old('DIENVIEN', $movie->DIENVIEN) }}" 
                    placeholder="Enter actor names">
            </div>

            <!-- Trạng thái phim -->
            <div class="mb-3">
                <label for="status" class="form-label"><strong>Status:</strong></label>
                <select name="status" class="form-control" id="status">
                    <option value="Đang chiếu" {{ old('status', $movie->status) == 0 ? 'selected' : '' }}>Active</option>
                    <option value="Ngừng chiếu" {{ old('status', $movie->status) == 1 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Poster -->
            <div class="mb-3">
                <label for="POSTER" class="form-label"><strong>Poster:</strong></label>
                <input 
                    type="file" 
                    name="POSTER" 
                    class="form-control" 
                    id="POSTER">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="/phim" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
