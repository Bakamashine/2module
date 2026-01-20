<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\WithFaker;

class Room extends Model
{
    protected $fillable = [
        "hashName"
    ];

    protected $attributes = [
        "hashName" => Hash::make("Stepashka")
    ];
}
