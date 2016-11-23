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
		<div style="overflow: hidden;" class="form-group">
		<div><input class="form-control"  required="required"  name="otp" type="text"></div>
		</div>
		<div style="text-align: center">
		<a href="/loginpage" class ="btn btn-danger" style="float: left">Log Out</a>
		<a href="{{ route('otp.store') }}" class ="btn btn-primary" style="float: center">Resend OTP</a>	
		<a href="{{ route('otp.create') }}" class ="btn btn-success" style="float: right">Submit</a>
		</div>
	</div>

	</div>
		<br>
		<br>

	</div>
@endsection