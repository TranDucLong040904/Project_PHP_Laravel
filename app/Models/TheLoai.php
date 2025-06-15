<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = 'theloai'; // Tên bảng trong CSDL
    protected $primaryKey = 'IDTHELOAI'; // Khóa chính

    public $incrementing = false;

    // Đảm bảo khóa chính là chuỗi
    protected $keyType = 'string';

    protected $fillable = ['IDTHELOAI', 'TENTHELOAI'];


    public function movies()
    {
        return $this->hasMany(Movie::class, 'IDTHELOAI', 'IDTHELOAI');
    }

    
}

