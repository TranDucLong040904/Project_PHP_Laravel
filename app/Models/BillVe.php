<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillVe extends Model
{
    use HasFactory;

    protected $table = 'bill_ve';
    protected $primaryKey = 'IDBILL_VE';

    protected $fillable = ['name', 'DONGIA', 'NGAYTAO', 'PAYMENTID'];

    public function user()  
    {  
        return $this->belongsTo(User::class, 'name', 'name'); 
    }  

    public function payment()  
    {  
        return $this->belongsTo(Payment::class, 'PAYMENTID', 'id');  
    }
}
