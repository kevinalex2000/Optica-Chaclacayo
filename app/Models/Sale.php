<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client',
        'id_product',
        'id_user',
        'id_office',
        'code',
        'total',
        'date_sale'
    ];

    public function client(){
        return $this->belongsTo(Client::Class, "id_client");
    }
    public function product(){
        return $this->belongsTo(Product::Class, "id_product");
    }
    public function user(){
        return $this->belongsTo(User::Class, "id_user");
    }
    public function office(){
        return $this->belongsTo(Office::Class, "id_office");
    }
}
