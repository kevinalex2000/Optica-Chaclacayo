<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'trademark',
        'material',
        'image',
        'description',
        'stock_initial',
        'stock',
        'price',
        'is_enabled',
        'id_category'
    ];

    public function product(){
        return $this->belongsTo(Category::Class, "id_category");
    }
}
