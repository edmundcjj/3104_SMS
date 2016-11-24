@extends('home')

@section('stylesheet')

@section('content')

<div class="row">
<div class="col-md-2"></div>
 <div class="col-md-8">

 {!! Form::open(['route' => 'lecturers.store']) !!}
<form class="form-horizontal">
	

<div class="form-group">
	{!! Form::label('lecturerName', 'Full Name:') !!}
    {!! Form::text('lecturerName', null, ['class' => 'form-control', 'required' ,'placeholder' => 'Enter Name']) !!}
</div>

<div class="form-group">
	{!! Form::label('lecturer_Nric', 'NRIC:') !!}
	{!! Form::text('lecturer_Nric', null, ['class' => 'form-control', 'required' ,'placeholder' => 'Enter NRIC', 'maxlength' => '9']) !!}
</div>

<div class="form-group">
	{!! Form::label('lecturer_id', 'Admin Number:') !!}
	{!! Form::text('lecturer_id', null, ['class' => 'form-control', 'required' ,'placeholder' => 'Enter Admin No.', 'maxlength' => '8']) !!}
</div>


<div class="form-group">
{!! Form::label('lecturer_Password', 'Password:') !!}
<!--{ !! Form::password('lecturer_Password', array('class' => 'form-control', 'required' ,'placeholder' => 'Enter Password' )) !!}-->
<div class="input-group input-group-unstyled">
<input class="form-control" type="password"  name="lect_Pass" id="lecturer_Password" placeholder="Enter Password">
<span class="input-group-addon">
<i class="glyphicon glyphicon-eye-open" name="leye" id="leye"></i>
</span>
</div>

</div>


<div class="form-group">
	{!! Form::label('lecturer_email', 'E-Mail Address:') !!}
	{!! Form::text('lecturer_email', null, array('required', 'class'=>'form-control', 'placeholder'=>'Enter E-Mail Address')) !!}
</div>



<div class="form-group">
	{!! Form::label('address', 'Address:') !!}
	{!! Form::text('address', null, ['required' ,'class' => 'form-control', 'placeholder' => 'Enter Address']) !!}
</div>

<div class="form-group">
	{!! Form::label('birthDate', 'Date of Birth:') !!}
	{!! Form::text('birthDate', null, ['required','readonly','class' => 'form-control datepicker', 'style' => 'width:200px']) !!}
</div>

<div class="form-group">
	{!! Form::label('position', 'Position:') !!}
	{!! Form::select('position', array( 'HOD' => 'HOD'  ,'Staff' => 'Staff'), null, [ 'class' => 'form-control', 'style' => 'width:200px'] )  !!}
</div>


<div class="form-group"><center>
    {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
</center></div>

</form> 

{!!Form::close()!!}
</div> <!-- End of col-md-8 -->

<div class="col-md-2"></div>
</div> <!-- End of Top Row -->
@endsection

@section('scripts')
{{ Html::script('js/script.js') }}
@endsection