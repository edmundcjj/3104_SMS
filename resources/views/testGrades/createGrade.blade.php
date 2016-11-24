@extends('home')

@section('title', '| Grades')

@section('stylesheets')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

@endsection

@section('content')


	<h2><span class="glyphicon glyphicon-user"></span> Tan Ah Kao</h2>

	
	@foreach($mod as $id=>$m)
	
	<h4> Grades for {!!$mid = $id!!} - {!!$m!!} </h4>

	@endforeach

	{!! Form::open(['url'=>'add_grades']) !!}
	<div class='form-group col-xs-4'>
	Change Module:
	<select class="form-control" id="mod">
	<option value=""> </option>
	@foreach($moduleList as $id=>$modName)
	<option value="{!! $id !!}">{!! $modName !!}</option>
	@endforeach
	</select>
	</div>
	
	<div class="form-group col-xs-3">
	Test Name:
	{!! Form::text('testName', null, ['class' => 'form-control', 'required']) !!}
	</div>
	<div>
		<div class="table-responsive">
		<table class="table table-bordered" id="classList" name="classList">
		<tr>
			<th>Student Name</th>
			<th>Matric No.</th>
			<th>Grade</th>
			<th>Feedback  </th>
		</tr>
		@foreach($classList as $class)
		<tr>
			<td>{!! $class->studentName !!}</td>
			<td> <input class="form-control" required="required" name="studentID[]" type="text" value="{!! $class->studentID !!}" readonly>
			<input class="form-control" required="required" name="moduleID" type="hidden" value="{!! $mid !!}"></td>
			<td>{!! Form::text('grade[]', null, ['class' => 'form-control', 'required']) !!}</td>
			<td>{!! Form::text('feedback[]', null, ['class' => 'form-control']) !!}</td>
		</tr>
		@endforeach
		</table>
		{!! Form::submit('Submit', array('class'=>'btn btn-lg', 'style'=>'float:right')) !!}
		<br>
		<br>
	</div>

	{!! Form::close() !!}
	
<script>
	$('#mod').change(function(e){
		window.location.href = '/create_grades/'+$('#mod')[0].value+"";
		
	});
	</script>
	</div>
@endsection