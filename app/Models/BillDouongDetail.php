<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDouongDetail extends Model
{
    use HasFactory;

    protected $table = 'bill_douong_detail';
    protected $primaryKey = null;
    public $incrementing = false; // Do bảng này không có khóa chính

    protected $fillable = [  
        'IDDOUONG',  
        'DONGIA',  
        'SOLUONG',  
        'NGAYTAO',  
        'PAYMENTSTATUS',  
    ]; 

    public function douong()  
    {  
        return $this->belongsTo(DoUong::class, 'IDDOUONG');  
    }  

    // Thiết lập quan hệ với bảng payment  
    public function payment()  
    {  
        return $this->belongsTo(Payment::class, 'IDBILL_VE', 'ID');  
    } 
}
