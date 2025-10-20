<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';

    // Make all form fields fillable
    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'mobile',
        'address',
        'guardian_name',
        'mother_name',
    ];
}
