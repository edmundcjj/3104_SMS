@extends('home')

@section('stylesheet')

@section('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	{{--<h2><span class="glyphicon glyphicon-user"></span>Admin</h2>--}}
	<h4> List of Recommendations </h4>
	<div class="table-responsive">
	<table class="table table-condensed">
	<thead>
	<tr>
		<th>Module ID</th>
		<th>Test Name</th>
		<th>Student ID</th>
		<th>Grade</th>
		<th>Recommendation</th>
		<th>Status</th>
		<th>Option Task</th>
	</tr>
	</thead>
	<tbody>
		@foreach($recommendList as $r)
		<tr>
			<td>{!! $r->moduleID !!}</td>
			<td>{!! $r->testName !!}</td>
			<td>{!! $r->studentID !!}</td>
			<td>{!! $r->grade !!}</td> 
			<td>{!! $r->recommendation !!}</td> 
			<td>{!! $r->recommendResult !!}</td> 
			<td><a href="execute{!! $r->recommendResult !!}/{!! $r->resultID !!}" class="btn action btn-primary" >Execute</a></td> 
			
		</tr>
		@endforeach
	</tbody>
	</table>
	</div>
		<br>
		<br>

	</div>
@endsection