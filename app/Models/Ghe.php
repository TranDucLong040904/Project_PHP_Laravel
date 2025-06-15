<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ghe extends Model
{
    use HasFactory;
    protected $table = 'masoghe';  
    protected $primaryKey = 'IDGHE';

    public function billVe()  
    {  
        return $this->hasMany(BillVe::class, 'IDGHE', 'IDGHE'); // Một ghế có thể liên kết với nhiều bill  
    } 

    public function ve() {
        return $this->hasMany(Ve::class, 'IDGHE');
    }

    public function loaighe() {
        return $this->hasMany(LoaiGhe::class, 'IDLOAIGHE');
    }
}
