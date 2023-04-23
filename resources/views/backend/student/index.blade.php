@extends('layouts.backend.dashboard')
@section('content')

<div class="container">
    <div class="row col-md-12 col-md-offset-2 custyle">
        <h4 id="count"></h4>
        <table class="table table-dark" style="margin-bottom:-40px; margin-top:0px;" id="table">
            <tr>
                <td> <h5> students - {{ $students->count() }}</h5> </td>
                <!-- <td class="text-right"> <h5> <a href="{{ route('student.create') }}" class="btn btn-primary" style="margin-bottom:0px; margin-left:500px;"><b>+</b> Add New student </a> </h5> -->
            </tr>
        </table>
        <table class="table" style="margin-top:30px;">
                <thead>
                    <tr style="color:black">
                        <th> ID </th>
                        <th> Name </th>
                        <th> Course </th>
                        <th> Teacher </th>
                        <th> BDAY </th>
                        <th> Mail </th>
                        <th> Contact </th>
                        <th> NIC </th>
                        <th style="width:115px;">Edit</th>
                        <th class="text-center" style="width:115px;">Delete</th>
                    </tr>
                </thead>
                <tbody id="tabelcontents">
                    @foreach($students as $student)
                    <tr>
                        <td> {{ $student->id }} </td>
                        <td> {{ $student->name }} </td>
                        <td> 
                            @foreach($student->courses as $course) {{ $course->name }} <br> @endforeach</td>
                        <td> {{ $student->teacher->name }} </td>
                        <td> {{ $student->bday }} </td>
                        <td> {{ $student->email }} </td>
                        <td> {{ $student->phone }} </td>
                        <td> {{ $student->nic }} </td>
                        <td>
                            <a href="{{ route('student.edit',$student->id) }}"><span><i class="fas fa-edit 2"></i></span></a>
                        </td>
                        <td class="text-center">
                            <form action="{{route('student.destroy',[$student->id])}}" method="post">
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