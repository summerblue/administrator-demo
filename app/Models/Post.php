<?php

namespace App\Models;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];
}
