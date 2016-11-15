@extends('home')

@section('title', '| Results')

@section('stylesheets')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection

@section('content')

	<h4> Results </h4>
	<div class="table-responsive">
	<table class="table table-condensed">
	<thead>
	<tr>
		<th>Module Code</th>
		<th>Test Name</th>
		<th>Results</th>
	</tr>
	</thead>
	<tbody>
		@foreach($gradeList as $test)
		<tr>
			<td>{!! $test->moduleID !!}</td>
			<td>{!! $test->testName !!}</td>
			<td>{!! $test->grade !!}</td> 
		</tr>
		@endforeach
	</tbody>
	</table>
	</div>
		<br>
		<br>

	</div>
@endsection