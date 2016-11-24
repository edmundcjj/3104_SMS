@extends('home')

@section('stylesheet')

@section('content')

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		@foreach ($edit_lecturer as $lecturer)

		{{ Form::model($lecturer, array('route' => array('lecturers.update', $lecturer->lecturerID), 'method' => 'PUT')) }} 

		<div class="form-group">
			{!! Form::label('lecturerName', 'Full Name:', ['class' => 'control-label']) !!}
			{!! Form::text('lecturerName', $lecturer->lecturerName, ['required', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('lecturer_Nric', 'NRIC:', ['class' => 'control-label']) !!}
			{!! Form::text('lecturer_Nric', $lecturer->lecturer_Nric, ['readonly', 'class' => 'form-control']) !!}
		</div>


		<div class="form-group">
			{!! Form::label('lecturer_id', 'Matriculation Number:', ['class' => 'control-label']) !!}
			{!! Form::text('lecturer_id', $lecturer->lecturerID, ['class' => 'form-control', 'readonly' , 'maxlength' => '8']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('lect_Pass', 'Password:') !!}
		<div class="input-group input-group-unstyled">
		 <input class="form-control" type="password"  name="lect_Pass" id="lect_Pass" placeholder="Enter Password" value={!! $lecturer->lecturerPassword !!}> 

		<span class="input-group-addon">
		<i class="glyphicon glyphicon-eye-open" name="seelectpass" id="seelectpass"></i>
		</span>
		</div>

		</div>

		<div class="form-group">
			{!! Form::label('birthDate', 'Date of Birth:') !!}
			{!! Form::text('birthDate', date('d M Y', strtotime( $lecturer->birth_Date)), ['required','readonly','class' => 'form-control datepicker']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('address', 'Address:') !!}
			{!! Form::text('address', $lecturer->address, ['required' ,'class' => 'form-control', 'placeholder' => 'Enter Address']) !!}
		</div>

		@if(Auth::user()->role == "Admin")
		<div class="form-group">
				{!! Form::label('position', 'Status:') !!}
				{!! Form::select('position', array( 'HOD' => 'HOD'  ,'Staff' => 'Staff'), null, [ 'class' => 'form-control', 'readonly','style' => 'width:200px'] )  !!}
		</div>
		@endif

		<center>
		@if(Auth::user()->role == "Admin")
		<a href="{{ route('lecturers.index') }}" class="btn btn-default">Back</a>
		@else
		<a href="{{ url('home') }}" class="btn btn-default">Back</a>
		@endif

		{!! Form::submit('Update Particular', ['class' => 'btn btn-success']) !!}</center>
		@endforeach

		{{ Form::close() }}

	</div>
	<div class="col-md-2"></div>
</div>

@endsection

@section('scripts')
{{ Html::script('js/script.js') }}

@endsection