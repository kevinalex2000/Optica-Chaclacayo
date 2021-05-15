<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormCategory extends Model
{
    use HasFactory;

    protected $table = "form_categories";

    protected $fillable = [
        'id_category',
        'field',
        'type',
        'values'
    ];
}
