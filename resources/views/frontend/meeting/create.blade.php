@extends('layouts.frontend.dashboard')

@section('content')
<div class="container" style="margin-top:150px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Meeting') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('meeting.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>
                            <div class="col-md-6">
                                <input id="course" type="text" class="form-control" name="course" value="{{ $te->course->name }}" readonly required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>
                            <div class="col-md-6">
                                <input id="time" type="text" class="form-control" name="time" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stu" class="col-md-4 col-form-label text-md-right">{{ __('Invite Students') }}</label>
                            <div class="col-md-6">
                                <input id="stu" type="text" class="form-control" name="stu" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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
