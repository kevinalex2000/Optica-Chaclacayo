<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_vendor',
        'code',
        'description'
    ];

    public function vendor(){
        return $this->belongsTo(Vendor::Class, "id_vendor");
    }
}
