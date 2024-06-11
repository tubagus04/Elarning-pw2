<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan data student
    public function index(){
        // menarik data dari database
        $students = Student::all();
        

        // panggil view dan kirim data students
        return view('admin.contents.student.index',[
            'students' => $students
        ]);
    }

    public function create(){
        // mengambil dat course
        $courses = Courses::all();

        
        return view('admin.contents.student.create',[
            'course' => $courses
        ]);
    }


    public function store(request $request){
        // falidasi data
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'course_id' => 'nullable'
        ]);

        // simpan ke database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'course_id' => $request->course_id 
        ]);

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('massage', 'Berhasil Menambahkan Student');

    }
      // method menampilkan halaman Edit
      public function edit($id){
        // cari data student berdasarkan id
        $student = Student::find($id); //Select * from student where id=$id
        $courses = Courses::all();
        return view('admin.contents.student.edit', compact('student', 'courses'));
    }

    // method untuk menyimpan hasil
    public function update($id, Request $request){
        // cari data student berdasarkan id
        $student = Student::find($id); // SELECT * FROM students WHERE id=$id

        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required'
        ]);

        // simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        // retrun to index
        return redirect('/admin/student')->with('massage', 'Berhasil Memperbarui Student');
    }

    // method untuk menghapus
    public function destroy($id){
        // cari data student berdasarkan id
        $student = Student::find($id); // SELECT * FROM students WHERE id=$id

        // hapus student
        $student->delete();

         // retrun to index
         return redirect('/admin/student')->with('massage', 'Berhasil Memperbarui Student');
    }
}