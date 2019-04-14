<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
   
    protected $fillable = [
        'name', 'email', 'phone_number','address', 'password', 'role', 'note', 'remember_token',
    ];

    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bills(){
        return $this->hasMany('App\Bill', 'customer_id', 'id');
    }
    public function cart(){
        return $this->hasOne('App\Cart');
    }
    
}
