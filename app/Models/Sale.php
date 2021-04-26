<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client',
        'code',
        'description',
        'is_delivered',
        'date_delivered'
    ];
    
    public function client(){
        return $this->belongsTo(Client::Class, "id_client");
    }
}
