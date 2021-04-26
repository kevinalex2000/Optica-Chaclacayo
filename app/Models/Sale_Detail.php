<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_Detail extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_product',
        'id_sale',
        'price',
        'quantity',
        'total'
    ];

    public function product(){
        return $this->belongsTo(Product::Class, "id_product");
    }

    public function sale(){
        return $this->belongsTo(Sale::Class, "id_sale");
    }

}
