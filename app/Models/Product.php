<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;



class Product extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = ['name','description','price','stock','category_id'];

    public function Category(){
        return $this->BelongsTo(Category::class);
    }
}
