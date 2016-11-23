@if (Session::has('success'))

	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>
	
@endif

@if (Session::has('unsuccess_NRIC'))

	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong> {{ Session::get('unsuccess_NRIC') }}
	</div>

@endif

@if (Session::has('unsuccess_otp'))

	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong> {{ Session::get('unsuccess_otp') }}
	</div>

@endif


 @if ($errors->any())     
 	<div class="alert alert-danger" role="alert"> 
 		<strong>Alert!</strong>
 			<ul>
    			@foreach( $errors->all() as $message )
       				<li> {{ $message }} </li>  
    			@endforeach 
    		</ul>
   	</div>      
@endif

