<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;


class Product extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;
    protected $table = "products";
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'price',
        'phone',
        'status',
        'location',
        'phone',
        'approve',
        'image'
    ];
    protected $primaryKey = 'id';
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        parent::observe(ProductObserver::class);
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
