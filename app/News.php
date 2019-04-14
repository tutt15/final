<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "News";

    protected $fillable = ['title','epitomize', 'content', 'image', 'new'];
}
