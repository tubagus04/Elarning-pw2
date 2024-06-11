<?php

namespace App\Models;
use App\Models\Courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    // mendefinikan field yang boleh diisi
    protected $fillable = ['name','nim','major','class','course_id'];

    /**
     * 1. one to one:
     * -- hasOne()          :digunakan pada model yang menitipkan id
     * -- belongsTo()       :digunakan pada tabel yang memiliki id dari tabel lain
     * 2. one to many:
     * -- hasMany()         :digunakan pada model yang menitipkan id
     * -- belongsToMany()   :digunakan pada tabel yang memiliki id dari tabel lain
     */

    // relasi ke model course (1 student memiliki 1 course / 1 to 1)
    public function course(){
        return $this->belongsTo(Courses::class);
    }
}