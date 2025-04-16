<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    public $table = 'courses';
    protected $fillable = [
        
        'department_id',
        'name',
        'description',
    ];
}
