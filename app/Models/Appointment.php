<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'case',
        'detail',
        'price',
        'id_appointment_state',
        'id_client',
        'id_user'
    ];

    public function appointment_state(){
        return $this->belongsTo(Appointment_State::Class, "id_appointment_state");
    }

    public function client(){
        return $this->belongsTo(Client::Class, "id_client");
    }

    public function user(){
        return $this->belongsTo(User::Class, "id_user");
    }
}
