<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{
    use HasFactory;

    protected $table = 'lichchieu';

    protected $primaryKey = 'IDLICHCHIEU';

    public function room()
    {
        return $this->belongsTo(PhongChieu::class, 'IDPHONGCHIEU');
    }

    public $incrementing = false;

    // Đảm bảo khóa chính là chuỗi
    protected $keyType = 'string';

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'IDPHIM', 'IDPHIM');
    }

    public function seats()  
    {  
        return $this->hasMany(TrangThaiGhe::class, 'IDGHE', 'IDLICHCHIEU'); // Adjust the foreign keys based on your actual relationship  
    } 

    public function ves()  
    {  
        return $this->hasMany(Ve::class, 'IDLICHCHIEU', 'IDLICHCHIEU');  
    }  
}
