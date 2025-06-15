<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'phim';

    protected $primaryKey = 'IDPHIM';

    protected $fillable = [
        'IDPHIM',
        'TENPHIM',
        'IDTHELOAI',
        'THOILUONG',
        'DAODIEN',
        'NAMPH',
        'POSTER',
        'DESCRIP',
        'create_at',
        'update_at'
    ];
    // public function lichchieu()
    // {
    //     return $this->belongsTo(Showtime::class, 'maPhim','maPhim');
    // }

    public function lichChieu()
    {
        return $this->hasMany(LichChieu::class, 'IDPHIM');
    }
    

    // public function rapchieu()
    // {
    //     return $this->hasMany(RapChieu::class, 'maPhim','maPhim');
    //     // ->hasMany(Showtime::class, 'maRap','maRap');
    // }

    public function theLoai()
    {
        return $this->belongsTo(TheLoai::class, 'IDTHELOAI', 'IDTHELOAI');
    }

    public function lichChieus()  
    {  
        return $this->hasMany(LichChieu::class, 'IDPHIM', 'IDPHIM');  
    } 


}