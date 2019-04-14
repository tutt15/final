<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contactus';
    protected $fillable = ['name','email','message'];
}
