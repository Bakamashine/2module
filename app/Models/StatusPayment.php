<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPayment extends Model
{

    // public $timestamps = false;
    protected $fillable = [
        "status",
        "course_id",
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
