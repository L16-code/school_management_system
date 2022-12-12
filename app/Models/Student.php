<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table='student';
    protected $fillable=[
        'lname',
        'secemail',
        'phone',
        'address',
        // 'password',
        'img',
        'gender',
        'student_id',
        'state',
        'city',
        'dob',
        'zip',
        'is_delete',


    ];
}
