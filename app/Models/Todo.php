<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillabel = [
        'content'
    ];

    public $timestamps = true;
}