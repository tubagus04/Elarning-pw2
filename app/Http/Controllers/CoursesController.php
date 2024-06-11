<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //
    public function index(){
        // menarik data dari database
        $course = Courses::all();
        

        // panggil view dan kirim data course
        return view('admin.contents.courses.index',[
            'courses' => $course
        ]);
    }

    public function create(){
  
        return view('admin.contents.courses.create');
    }

    public function store(request $request){
        // falidasi data
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required'
        ]);

        // simpan ke database
        Courses::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc
        ]);

        // kembalikan ke halaman student
        return redirect('/admin/course')->with('massage', 'Berhasil Menambahkan Course');

    }

    public function edit($id){
        // cari data student berdasarkan id
        $courses = Courses::find($id); //Select * from course where id=$id

        return view('admin.contents.courses.edit', [
            'courses' => $courses
        ]);
    }

    public function update($id, Request $request){
        // cari data student berdasarkan id
        $courses = Courses::find($id); // SELECT * FROM course WHERE id=$id

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required'
        ]);

        // simpan perubahan
        $courses->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc
        ]);

        // retrun to index
        return redirect('/admin/course')->with('massage', 'Berhasil Memperbarui Course');
    }

    public function destroy($id){
        // cari data course berdasarkan id
        $courses = Courses::find($id); // SELECT * FROM Course WHERE id=$id

        // hapus course
        $courses->delete();

         // retrun to index
         return redirect('/admin/course')->with('massage', 'Berhasil Memperbarui course');
    }
}