<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name']; 
    
    // a categoria so precisa do nome, mas se tivesse mais dados seria incrementado no array ['name', 'lastName', ...]

    public function exercises() {

        // uma categoria possui muitos exercicios

        return $this->hasMany('App\Models\Exercise');

    }
}
