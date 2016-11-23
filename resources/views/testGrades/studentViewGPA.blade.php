@extends('home')

@section('title', '| Results')

@section('stylesheets')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection

@section('content')

	<h4> GPA Result </h4>
	<div class="table-responsive">
	<table class="table table-condensed">
	<thead>
	<tr>
		<th>Trimester</th>
		@if(Auth::user()->role != "Student")
		<th>Trimester GPA</th>
		@endif
		<th>Cumulative GPA</th>

	</tr>
	</thead>
	<tbody>
	@for($t = 0 ; $t < count($trimestergpa); $t++)
		<tr>
			<td>{!! $trimester[$t] !!}</td>
			@if(Auth::user()->role != "Student")
			<td>{!! number_format($trimestergpa[$t],2) !!}</td>
			@endif
			<td>{!! number_format($cumulativegpa[$t],2) !!}</td>
		</tr>
	@endfor
	</tbody>
	</table>
	</div>
		<br>
		<br>

	</div>
@endsection