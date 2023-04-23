@extends('layouts.backend.dashboard')
@section('content')

<div class="container">
    <div class="row col-md-12 col-md-offset-2 custyle">
        <h4 id="count"></h4>
        <table class="table table-dark" style="margin-bottom:-40px; margin-top:0px;" id="table">
            <tr>
                <td> <h5> Courses - {{ $courses->count() }}</h5> </td>
                <td class="text-right"> <h5> <a href="{{ route('course.create') }}" class="btn btn-primary" style="margin-bottom:0px; margin-left:600px;"><b>+</b> Add New course </a> </h5>
            </tr>
        </table>
        <table class="table" style="margin-top:30px;">
                <thead>
                    <tr style="color:black">
                        <th> ID </th>
                        <th> Course Name </th>
                        <th> Fees </th>
                        <th> Teachers </th>
                        <th> Students </th>
                        <th class="text-center" style="width:115px;">Action</th>
                    </tr>
                </thead>
                <tbody id="tabelcontents">
                    @foreach($courses as $course)
                    <tr>
                        <td> {{ $course->id }} </td>
                        <td> {{ $course->name }} </td>
                        <td> {{ $course->fees }} </td>
                        <td> @foreach($course->teachers as $teacher) {{ $teacher->name }} <br> @endforeach</td>
                        <td> @foreach($course->students as $student) {{ $student->name }} <br> @endforeach </td>
                        <td class="text-center">
                            <form action="{{route('course.destroy',[$course->id])}}" method="post">
                                @csrf   
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Do you want to delete?')"><span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

@endsection