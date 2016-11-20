@extends('home')

@section('title', '| Grades')

@section('stylesheets')
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection

@section('content')
	@if(Session::has('message'))
		<div class="alert alert-success">{{ Session::get('message') }}</div>
	@endif


	<h2><span class="glyphicon glyphicon-user"></span> Tan Ah Kao</h2>
	<h4> Grades </h4>
	Tests:

	<div class="table-responsive">
		<table class="table table-condensed">
			<thead>
			<tr>
				<th>Student Matric</th>
				<th>Grade</th>
				<th>Feedback</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			@foreach($testList as $test)
				<tr>
					<td>{!! $test->studentID !!}</td>
					<td>{!! $test->grade !!}</td>
					<td>{!! $test->recommendation !!}</td>
					<td><a class="btn action btn-info" href="{{ url('grades_details_edit', $test->resultID) }}" >Edit</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<a style="float:right" class="btn action btn-info" href="{{ url('grades_details_submit', $test->resultID) }}" >Submit to HOD</a>
	</div>
	<br>
	<br>
	</div>
@endsection