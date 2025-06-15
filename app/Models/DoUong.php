<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoUong extends Model
{
    use HasFactory;

    protected $table = 'douong';  
    protected $primaryKey = 'IDDOUONG'; 
    public $incrementing = false;  
    protected $keyType = 'string';

    protected $fillable = [  
        'TENDOUONG',  
        'DONGIA',  
        'SOLUONG',
        'IMAGE',
        'MOTA', 
        'status',  
    ]; 

    public function details()  
    {  
        return $this->hasMany(Detail::class, 'IDDOUONG', 'IDDOUONG');  
    }  
}
