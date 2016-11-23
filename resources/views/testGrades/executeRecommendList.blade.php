@extends('home')

@section('stylesheet')

@section('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<h2><span class="glyphicon glyphicon-user"></span>Admin</h2>
	<h4> List of Recommendations </h4>
	<div class="table-responsive">
	<table class="table table-condensed">
	<thead>
	<tr>
		<th>Name</th>
		<th>Student ID</th>
		<th>Course</th>
		<th>Module</th>
		<th>Test Name</th>
		<th>Grade</th>
		<th>Recommendation</th>
		<th>Status</th>
		<th>Option Task</th>
	</tr>
	</thead>
	<tbody>
		@foreach($recommendList as $r_List)
		<tr>
		{{ Form::open(array('url'=> array('updateRecommendation',$r_List->resultID, $r_List->grade) )) }}
			<td>{!! $r_List->studentName !!}</td>
			<td>{!! $r_List->studentID !!}</td>
			<td>{!! $r_List->courseName !!}</td>
			<td>{!! $r_List->moduleName !!}</td>
			<td>{!! $r_List->testName !!}</td>
			<td>{!! $r_List->grade !!}</td> 
			<td>{!! $r_List->recommendation !!}</td> 
			<td>{!! $r_List->recommendResult !!}</td> 
			<td width=200px>{{ Form::number('newResultValue',  null ,['class' => 'newResultWidth', 'min'=>'1', 'max' => '10','required']) }} 
					{!! Form::submit('Update', array('class'=>'btn btn-success updateGradesBtn')) !!}</td>
					{{Form::close()}}	

			<!-- <td>
			<a href="execute{ !! $r->recommendResult !!}/{ !! $r->resultID !!}" class="btn action btn-primary" >Execute</a></td>  -->
			
		</tr>
		@endforeach
	</tbody>
	</table>
	</div>
		<br>
		<br>

	</div>
@endsection