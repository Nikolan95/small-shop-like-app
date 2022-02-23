<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = "sub_categories";
    protected $fillable = [
        'id',
        'category_id',
        'name',
    ];
    protected $primaryKey = 'id';

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
