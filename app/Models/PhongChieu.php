<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongChieu extends Model
{
    use HasFactory;

    protected $table = 'phongchieu';

    protected $primaryKey = 'IDPHONGCHIEU';

    protected $fillable = [
        'IDPHONGCHIEU',
        'TENPHONGCHIEU',
        'create_at',
        'update_at'
    ];

    public $incrementing = false; // Bỏ qua tự động tăng  
    protected $keyType = 'string'; // Đảm bảo rằng ID là chuỗi 

    public function lichChieu()  
    {  
        return $this->hasMany(LichChieu::class, 'IDPHIM', 'IDPHONGCHIEU');  
    }  

    public function billVe()  
    {  
        return $this->hasMany(BillVe::class, 'IDPHONGCHIEU', 'IDPHONGCHIEU'); // Một phòng có thể liên kết với nhiều bill  
    } 
}
