@extends('layouts.frontend.dashboard')

@section('content')


<div class="container" style="margin-top:150px;">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				
				<div class="profile-userpic">
				   <h4> <b> User Profile </b></h4>
				</div>
				
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						 Name : {{Auth::guard()->user()->name}} 
					</div> <br>
					<div class="profile-usertitle-job">
						Mail : {{Auth::guard()->user()->email}}
					</div><br>
                    <div class="profile-usertitle-job">
						Your Course : {{ $t->course->name }}
					</div><br>
                    <div class="profile-usertitle-job">
						Your Students : <br> @foreach($t->students as $s) {{ $s->name }} <br> @endforeach
					</div><br>
                    <div class="profile-userbuttons">
                        <a href="{{ route('meeting.create')}}" class="btn btn-success btn-sm"> Invite A New Class </a>
                    </div>
					<br>
				</div>
				
			</div>
		</div>

		<div class="col-md-9">
            <div class="profile-content">
			    <h3> Classess </h3> <br>
					<table class="table">
						<tr>
							<th> Course </th>
							<th> Time </th>
						</tr>
						@foreach($meet as $m)
						<tr>
							<td> {{ $m->course }} </td>
							<td> {{ $m->time }} </td>
						</tr>
						@endforeach
					</table>
            </div>
		</div>
	</div>
</div>




@endsection
