<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_order',
        'id_form_category',
        'value',
    ];

    public function formCategory(){
        return $this->belongsTo(FormCategory::Class, "id_form_category");
    }
}
