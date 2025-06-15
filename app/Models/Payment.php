<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    protected $fillable = ['PAYMENTMETHOD', 'STATUS'];

    public function getStatusLabelAttribute()  
    {  
        return $this->STATUS == 0 ? 'Active' : 'Inactive';  
    }  

    public function billDouongDetails()  
    {  
        return $this->hasMany(billDouongDetails::class, 'IDBILL_VE', 'ID'); 
  
    } 

    public function BillVes()  
    {  
        return $this->hasMany(BillVe::class, 'PAYMENTID', 'id');  
    } 
}
