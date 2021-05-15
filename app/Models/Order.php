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

    public function client(){
        return $this->belongsTo(Client::Class, "id_client");
    }

    public function product(){
        return $this->belongsTo(Product::Class, "id_product");
    }
    
    public function office(){
        return $this->belongsTo(Office::Class, "id_office");
    }
    
    public function user(){
        return $this->belongsTo(User::Class, "id_user");
    }
}
