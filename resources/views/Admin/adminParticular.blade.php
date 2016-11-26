@extends('home')

@section('stylesheet')

@section('content')

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		
		{{ Form::open(array('url' => array('updateChange', $admin_id) )) }} 

		<div class="form-group">
		{!! Form::label('stud_Pass', 'Password:') !!}
		<div class="input-group input-group-unstyled">

		
		<input class="form-control" type="password"  name="admin_Pass" id="admin_Pass" placeholder="Enter Password" required> 

	
		<span class="input-group-addon">
		<i class="glyphicon glyphicon-eye-open" name="seepass" id="seepass"></i>
		</span>
		</div>
		 
		</div>


		<center>
		<a href="{{ url('homepage') }}" class="btn btn-default">Back</a>
		{!! Form::submit('Update', ['class' => 'btn btn-success']) !!}</center>


		{{ Form::close() }}



		</div>
	<div class="col-md-2"></div>
</div>

@endsection

@section('scripts')
{{ Html::script('js/script.js') }}
<script>



</script>

@endsection