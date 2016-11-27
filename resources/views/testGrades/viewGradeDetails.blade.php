@extends('home')

@section('title', '| Grades')

@section('stylesheets')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection

@section('content')


	{{--<h2><span class="glyphicon glyphicon-user"></span> Tan Ah Kao</h2>--}}
	<h4> Grades </h4>
	Deadline to Submit:
	{{$deadlinetime}}

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
			<td>@if($currenttime > $deadlinetime)
				{{--<td><a class="btn action btn-info" href="{{ url('grades_details_edit', $test->resultID)}}" >Edit</a></td>--}}
				@else
				@if($teststatus == "Saved")
				<td><a class="btn action btn-info" href="{{ url('grades_details_edit', $test->resultID) }}" >Edit</a></td>
				@endif
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
	</table>
		@if($teststatus == "Saved")
		<a style="float:right" class="btn action btn-info" href="{{ url('grades_details_submit', $test->resultID) }}" >Submit to HOD</a>
		@endif
	</div>
		<br>
		<br>
	</div>
@endsection