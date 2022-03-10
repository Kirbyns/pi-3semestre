<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Category extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable =['name'];
    public function Products(){
        return $this->hasMany(Products::class);
    }
}
