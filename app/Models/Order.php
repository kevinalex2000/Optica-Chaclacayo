<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client',
        'id_product',
        'id_office',
        'id_user',
        'quantity',
        'is_delivered',
        'date_delivered',
        'prepayment'
    ];
}
