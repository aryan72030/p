<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
        protected $fillable = [
        'name',
        'description',
        'duration',
        'number',
        'price',
        'status',
        'image',
        'create_id',
    ];
}
