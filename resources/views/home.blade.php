
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
						Phone Nu : {{ $s->phone }}
					</div><br>
                    <div class="profile-usertitle-job">
						NIC : {{ $s->nic }}
					</div><br>
                    <div class="profile-usertitle-job">
						BDAY : {{ $s->bday }}
					</div><br>
                    <div class="profile-usertitle-job">
						Your Courses : <br> @foreach($s->courses as $c) {{ $c->name }} <br> @endforeach
					</div>
				</div>
				
			</div>
		</div>

		<div class="col-md-9">
            <div class="profile-content">
			    <h3> Classess </h3> <br>
					<table class="table">
						<tr>
							<th> Course </th>
							<th> Teacher </th>
							<th> Time </th>
							<th> Join </th>
							<th> Cancel </th>
						</tr>
						@foreach($meet as $m)
						<tr>
							<td> {{ $m->course }} </td>
							<td> {{ $m->teacher }} </td>
							<td> {{ $m->time }} </td>
							<td> <a href="" class="btn btn-success"> Join </a></td>
							<td> <a href="" class="btn btn-danger"> Cancel </a></td>
						</tr>
						@endforeach
						
					</table>
				
				
            </div>
		</div>
	</div>
</div>

<br><br>

@endsection
