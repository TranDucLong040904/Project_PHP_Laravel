<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThaiGhe extends Model
{
    use HasFactory;
    protected $table = 'trangthaighe';  
    protected $primaryKey = 'IDGHE'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 

    public function lichChieu()  
    {  
        return $this->belongsTo(LichChieu::class, 'IDLICHCHIEU', 'IDLICHCHIEU');  
    } 
}