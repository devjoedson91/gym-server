<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = ['exercise_id','user_id','amount_series', 'amount_repeat', 'load', 'day_week'];

    // protected $casts = ['week_days' => 'array', 'is_completed' => 'boolean'];

    public function user() {

        return $this->belongsTo('App\Models\User');

    }

    public function exercise() {

        return $this->belongsTo('App\Models\Exercise');

    }

}
