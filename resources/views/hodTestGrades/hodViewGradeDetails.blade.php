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
		<th>Student Matric</th>
		<th>Grade</th>
		<th>Feedback</th>
	</tr>
	</thead>
	<tbody>
		@foreach($testList as $test)
		<tr>
			<td>{!! $test->studentID !!}</td>
			<td>{!! $test->grade !!}</td>
			<td>{!! $test->recommendation !!}</td>
		</tr>
		@endforeach
	</tbody>
	</table>

	</div>
	@if($test->status == 'Pending')
	<a href="{{url('hod_grades_details_moderate/'.$passID)}}" style="float: right" class="btn action btn-info">Moderate</a>
	@endif
		<br>
		<br>
	@if($test->status == 'Pending')
	<a href="" style="float:right" class="btn action btn-info">Publish</a>
	@endif
	</div>
@endsection