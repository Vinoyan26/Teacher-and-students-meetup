@extends('layouts.backend.dashboard')
@section('content')

<div class="container">
    <div class="row col-md-12 col-md-offset-2 custyle">
        <h4 id="count"></h4>
        <table class="table table-dark" style="margin-bottom:-40px; margin-top:0px;" id="table">
            <tr>
                <td> <h5> Teachers - {{ $teachers->count() }}</h5> </td>
                <!--<td class="text-right"> <h5> <a href="{{ route('teacher.create') }}" class="btn btn-primary" style="margin-bottom:0px; margin-left:500px;"><b>+</b> Add New teacher </a> </h5>-->
            </tr>
        </table>
        <table class="table" style="margin-top:30px;">
                <thead>
                    <tr style="color:black">
                        <th> ID </th>
                        <th> Name </th>
                        <th> Course </th>
                        <th> Mail </th>
                        <th> Contact </th>
                        <th>Edit</th>
                        <th class="text-center" style="width:115px;">Delete</th>
                    </tr>
                </thead>
                <tbody id="tabelcontents">
                    @foreach($teachers as $teacher)
                    <tr>
                        <td> {{ $teacher->id }} </td>
                        <td> {{ $teacher->name }} </td>
                        <td> {{ $teacher->course->name }} </td>
                        <td> {{ $teacher->email }} </td>
                        <td> {{ $teacher->phone }} </td>
                        <td>
                            <a class='btn-xs' href="{{ route('teacher.edit',$teacher->id) }}"><span><i class="fas fa-edit 2"></i></span></a>
                       </td>
                        <td class="text-center">
                            <form action="{{route('teacher.destroy',[$teacher->id])}}" method="post">
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