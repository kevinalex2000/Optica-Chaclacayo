<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'id_purchase',
        'price',
        'quantity',
        'total'
    ];

    public function product(){
        return $this->belongsTo(Product::Class, "id_product");
    }

    public function purchase(){
        return $this->belongsTo(Purchase::Class, "id_purchase");
    }
}
