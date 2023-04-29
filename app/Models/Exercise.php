<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['name','cover','video','category_id'];

    public function category() {

        // um exercício pertence a uma categoria

        return $this->belongsTo('App\Models\Category');

    }
}
