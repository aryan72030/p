<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
        protected $fillable = ['key', 'value', 'create_id'];



    public static function setValue($key, $value, $id)
    {
        return self::updateOrCreate(['key'=>$key,'create_id' => $id], ['value' => $value]);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
