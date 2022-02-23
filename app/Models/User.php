<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "users";
    protected $fillable = [
        'id',
        'is_admin',
        'firstname',
        'lastname',
        'username',
        'email',
        'address',
        'city',
        'confirm_password',
    ];
    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function Products(){
        return $this->hasMany('App\Models\Product');
    }
}
