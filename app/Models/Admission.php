<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'email',
        'phone',
        'address',
        'highschool',
        'intermediate',
        'board',
        'department',
        'course',
    ];
}
