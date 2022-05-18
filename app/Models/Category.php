<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    protected $table = "categories";
    protected $fillable = [
        'name',
        'parent_id',
    ];

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products() {
        return $this->hasManyOfDescendantsAndSelf(Product::class);
    }

}
