<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDuong extends Model
{
    use HasFactory;

    protected $table = 'bill_duong';
    protected $primaryKey = 'IDBILL_DUONG';

    protected $fillable = ['name', 'DONGIA', 'NGAYTAO', 'PAYMENTSTATUS'];
}
