<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'rental_price',
        'id_user',
        'phone',
    ];

    public function client(){
        return $this->belongsTo(User::Class, "id_user");
    }
}
