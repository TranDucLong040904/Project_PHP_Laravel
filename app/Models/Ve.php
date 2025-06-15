<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    use HasFactory;
    
    protected $table = 've';
    protected $primaryKey = 'IDVE';
    public $timestamps = false;

    public $incrementing = false;   
    protected $keyType = 'string'; 

    protected $fillable = ['IDGHE', 'IDPHONGCHIEU', 'IDLICHCHIEU', 'IDBILL_VE', 'DONGIA', 'status'];

    public function ghe()  
    {  
        return $this->belongsTo(Ghe::class, 'IDGHE', 'IDGHE'); // 'IDGHE' trong bill_ve liên kết với 'IDGHE' trong ghe  
    }  

    // Quan hệ với mô hình Phong  
    public function phong()  
    {  
        return $this->belongsTo(PhongChieu::class, 'IDPHONGCHIEU', 'IDPHONGCHIEU'); // 'IDPHONGCHIEU' trong bill_ve liên kết với 'IDPHONGCHIEU' trong phong  
    } 

    public function bill()  
    {  
        return $this->belongsTo(BillVe::class, 'IDBILL_VE', 'IDBILL_VE');  
    }

    public function movie()  
    {  
        return $this->belongsTo(Movie::class, 'IDPHIM', 'IDPHIM'); // Điều chỉnh tên các tham số nếu cần  
    }

    public function lichChieu()  
    {  
        return $this->belongsTo(LichChieu::class, 'IDLICHCHIEU', 'IDLICHCHIEU');  
    } 
}
