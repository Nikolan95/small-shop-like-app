<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable = [
        'id',
        'user_id',
        'subcategory_id',
        'name',
        'description',
        'price'
    ];
    protected $primaryKey = 'id';

    public function subCategories(){
        return $this->hasMany('App\Models\SubCategory');
    }
}
