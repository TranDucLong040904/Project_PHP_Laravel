<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiGhe extends Model
{
    use HasFactory;

    protected $table = 'loaighe';  
    protected $primaryKey = 'IDLOAIGHE'; 
    public $incrementing = false;  
    protected $keyType = 'string';

    protected $fillable = [  
        'TENLOAIGHE',  
        'DONGIA',  
        'status',  
    ]; 
}
