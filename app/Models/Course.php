<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\courseFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "title",
        "description",
        "duration",
        "price",
        "image",
        "start",
        "end",
    ];
}
