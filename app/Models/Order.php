<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'price',
        'address',
        'city',
        'zip_code',
        'state',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
