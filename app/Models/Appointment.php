<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'service',
        'appointment_date',
        'start_time',
        'staff_availability',
        'status',
        'staff_id',
        'user_id',
    ];

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
