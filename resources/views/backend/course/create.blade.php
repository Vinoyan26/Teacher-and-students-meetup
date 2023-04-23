@extends('layouts.backend.dashboard')
@section('content')

<div class="product_create">
    
<h4 align="center" style="margin-bottom:30px;"> <b>  Add New Course </b> </h4>
<div class="container">
    
    <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data" onsubmit="return(validate());" name="createform">
    @csrf
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="name" class="text-uppercase"> Course Name </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Course Name" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="fees" class="text-uppercase"> Course Fees </label>
                <input type="text" class="form-control" id="fees" name="fees" placeholder="Course Fees" required>
            </div>
        </div>
        <br>

        <div style="margin-bottom:30px;">
            <input type="submit" value="Add" class="btn btn-primary">
            <a href="{{ route('course.index') }}" class="btn btn-danger"> Cancel </a>
        </div>
</form>
</div>


@endsection