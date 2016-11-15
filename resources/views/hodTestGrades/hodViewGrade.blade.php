@extends('home')

@section('title', '| Grades')

@section('stylesheets')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection

@section('content')

	<h4> Grades </h4>
	Tests:

	<div class="table-responsive">
	<table class="table table-condensed">
	<thead>
	<tr>
		<th>Module Code</th>
		<th>Module Name</th>
		<th>Test Name</th>
		<th>Status</th>
		<th>Task Option</th>
	</tr>
	</thead>
	<tbody>
		@foreach($testsList as $test)
		<tr>
			<td>{!! $test->moduleID !!}</td>
			<td>{!! $test->moduleName !!}</td>
			<td>{!! $test->testName !!}</td>
			<td>{!! $test->status !!}</td> 
			<td><a class="btn action btn-primary" href="hod_grades_details/{!! $test->testID !!}">View Details</a></td>
		</tr>
		@endforeach
	</tbody>
	</table>
	</div>
		<br>
		<br>

	</div>
@endsection