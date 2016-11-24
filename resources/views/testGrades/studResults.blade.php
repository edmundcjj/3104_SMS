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
			<td>
				@if ($test->grade >= 0 && $test->grade < 20)
					F
				@elseif ($test->grade >= 20 && $test->grade < 42)
					E
				@elseif ($test->grade >= 42 && $test->grade < 50)
					D
				@elseif ($test->grade >= 50 && $test->grade < 65)
					C
				@elseif ($test->grade >= 65 && $test->grade < 75)
					B
				@elseif ($test->grade >= 75 && $test->grade <= 100)
					A
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
	</table>
	</div>
		<br>
		<br>

	</div>
@endsection