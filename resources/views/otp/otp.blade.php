@extends('layouts.app')

@section('title', '| OTP')

@section('stylesheets')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection

@section('content')

<div>

		<div class="col-md-4 col-md-offset-4">
		<h3>An OTP has been sent to your email!</h3>
		<h4>Enter it in the textbox below: </h4>
		@include('partials._alertmessage')
		{!! Form::open(['url' => 'check']) !!}
		<div style="overflow: hidden;" class="form-group">
		<div>
		{!! Form::text('otpTxt', null, ['class' => 'form-control', 'required']) !!}</div>
		</div>
		<div style="text-align: center">
		<a href="/loginpage" class ="btn btn-danger" style="float: left">Log Out</a>
		<a href="/resend" class ="btn btn-primary" style="float: center">Resend OTP</a>
		{!! Form::submit('Submit', array('class'=>'btn btn-success', 'style'=>'float:right')) !!}
		</div>
		{!! Form::close() !!}
	</div>

	</div>
		<br>
		<br>

	</div>
@endsection