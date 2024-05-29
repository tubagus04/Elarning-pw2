<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //menampilkan data courses dari database
    public function index(){
        // mendapatkan data dari tabel courses
        $courses = Courses::all();

        // kirim data ke view untuk ditampilkan
        return view('admin.contents.courses.index',[
            'courses' => $courses
        ]);
    }
}
