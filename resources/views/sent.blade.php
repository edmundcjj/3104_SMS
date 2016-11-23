@extends('home')

@section('title', '| OTP')

@section('stylesheets')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection

@section('content')

<div>

		<div class="col-md-4 col-md-offset-4" style="text-align: center;">
		<h3>Enter OTP:</h3>
		<div style="overflow: hidden;" class="form-group">
		<div><input class="form-control"  required="required"  name="otp" type="text"></div>
		</div>
		<div style="text-align: center">
		<a href="{{ route('otp.store') }}" class ="btn btn-primary" style="float: left"></a>
		</div>
	</div>

	</div>
		<br>
		<br>

	</div>
@endsection