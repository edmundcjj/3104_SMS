@extends('home')

@section('title', '| Grades')

@section('stylesheets')

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

@endsection

@section('content')


	<h2><span class="glyphicon glyphicon-user"></span> Tan Ah Kao</h2>
	<h4> Grades </h4>

	<div class='form-group col-xs-5'>
	Choose Module:
	<select class="form-control" id="mod">
	<option value=""> </option>
	@foreach($moduleList as $id=>$modName)
	<option value="{!! $id !!}">{!! $modName !!}</option>
	@endforeach
	</select>


<script>
	$('#mod').change(function(e){
		window.location.href = '/create_grades/'+$('#mod')[0].value+"";
		
	});
	</script>

	</div>
@endsection