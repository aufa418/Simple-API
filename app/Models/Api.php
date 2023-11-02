<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    protected $fillable = [
        "name",
        "stock",
        "price"
    ];
}
