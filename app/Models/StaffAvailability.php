<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffAvailability extends Model
{
    protected $fillable = ['user_id', 'availability'];
    protected $casts = ['availability' => 'array'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
