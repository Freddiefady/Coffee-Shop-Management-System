<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'date', 'time', 'phone', 'message', 'status', 'user_id'
    ];
}
