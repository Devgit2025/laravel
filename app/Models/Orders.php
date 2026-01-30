<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Orders extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'order_date',
        'order_name',
        'order_email',
        'order_tel',
        'order_address',
        'order_price_total',
        'id_users'
    ];
}
