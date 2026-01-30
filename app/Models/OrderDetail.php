<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class OrderDetail extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'order_id',
        'pro_id',
        'pro_name',
        'pro_price',
        'order_detail_quantity',
        'order_detail_total'
    ];
}
