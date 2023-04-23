@extends('layouts.backend.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student Registation') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('student.update',$student->id) }}">
                        @csrf
                        @method('put')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $student->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $student->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Course For') }}</label>
                            <select name="course" id="course" class="form-control" style="width:320px;">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ ($course->id == $student->course_id) ? 'selected' : "" }}> {{ $course->name }} </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="teacher_id" class="col-md-4 col-form-label text-md-right">{{ __('Teacher') }}</label>
                            <select name="teacher" id="teacher" class="form-control" style="width:320px;">
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ ($teacher->id == $student->teacher_id) ? 'selected' : "" }}> {{ $teacher->name }} </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact Nu') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $student->phone }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bday" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birthday') }}</label>
                            <div class="col-md-6">
                                <input id="course" type="date" class="form-control" name="bday" value="{{ $student->bday }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nic" class="col-md-4 col-form-label text-md-right">{{ __('NIC') }}</label>
                            <div class="col-md-6">
                                <input id="nic" type="text" class="form-control" name="nic" value="{{ $student->nic }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ route('student.index') }}" class="btn btn-danger"> Cancel </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
