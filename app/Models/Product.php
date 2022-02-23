<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'id',
        'user_id',
        'subcategory_id',
        'name',
        'description',
        'price'
    ];
    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function subCategory(){
        return $this->belongsTo('App\Models\SubCategory', 'subcategory_id');
    }
}
