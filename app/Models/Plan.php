<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['title', 'description', 'plan_type', 'amount', 'duration', 'max_service', 'max_employees'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(PlanSubscription::class);
    }
}
