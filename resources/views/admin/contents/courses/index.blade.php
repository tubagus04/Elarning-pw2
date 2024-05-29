@extends('admin.main')
@section('content')
    <div class="pagetitle">
        <h1>Courses</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Courses</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <a href="#" class="btn btn-primary">+Courses</a>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Desc</th>
                    </tr>
                    @foreach($courses as $courses)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $courses->name }}</td>
                        <td>{{ $courses->category }}</td>
                        <td>{{ $courses->Desc }}</td>
                        <td>
                            <a href="#" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
