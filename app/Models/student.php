<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
        protected $table ='students';
        protected $primaryKey = 'id';
        protected $fillable = ['first_name','last_name','age','address','mobile','first_name','guardian_name','mother_name'];

        // use HasFactory;

}
