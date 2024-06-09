<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'block_name',
        'room_number',
        'stay_from',
        'course',
        'level',
        'reg_number',
        'last_name',
        'gender',
        'contact_number',
        'emergency_contact',
        'status',
    ];
}
