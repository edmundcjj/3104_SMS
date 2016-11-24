f+@extends('home')

@section('stylesheet')

@section('content')

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		@foreach ($edit_student as $editStudent)

		<!-- { !! Form::open(['route'=>'students.update'.$edit_student->studentID]) !!} -->

		{{ Form::model($editStudent, array('route' => array('students.update', $editStudent->studentID), 'method' => 'PUT')) }} 

		<div class="form-group">
			{!! Form::label('student_Name', 'Full Name:', ['class' => 'control-label']) !!}
			{!! Form::text('student_Name', $editStudent->studentName, ['required', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('studentNRIC', 'NRIC:', ['class' => 'control-label']) !!}
			{!! Form::text('studentNRIC', $editStudent->student_Nric, ['readonly', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('student_id', 'Matriculation Number:', ['class' => 'control-label']) !!}
			{!! Form::text('student_id', $editStudent->studentID, ['class' => 'form-control', 'readonly' ,'placeholder' => 'Enter Matriculation No.', 'maxlength' => '8']) !!}
		</div>

		<div class="form-group">
		{!! Form::label('stud_Pass', 'Password:') !!}
		<div class="input-group input-group-unstyled">

		
		<input class="form-control" type="password"  name="stud_Pass" id="stud_Pass" placeholder="Enter Password" value="{!! $editStudent->studentPassword !!}"> 

	
		<span class="input-group-addon">
		<i class="glyphicon glyphicon-eye-open" name="seepass" id="seepass"></i>
		</span>
		</div>
		 
		</div>

		<div class="form-group">
			{!! Form::label('birthDate', 'Date of Birth:') !!}
			{!! Form::text('birthDate', date('d M Y', strtotime( $editStudent->birth_Date)), ['required','readonly','class' => 'form-control datepicker']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('student_address', 'Address:') !!}
			{!! Form::text('student_address', $editStudent->address, ['required' ,'class' => 'form-control', 'placeholder' => 'Enter Address']) !!}
		</div>

		@if(Auth::user()->role == "Admin" || Auth::user()->role == "Hod" || Auth::user()->role == "Lecturer")
		<div>
			{!! Form::label('student_status', 'Status:') !!}
			{!! Form::select('student_status' ,array( 'Default' =>$editStudent->status,  'Pre Enroll' => 'Pre Enroll', 'Enroll' => 'Enroll', 'Graduate' => 'Graduate', 'Expel' => 'Expel' ), null, ['style' => 'width:200px'] )  !!}
		</div>
		@endif

		@if(Auth::user()->role == "Admin" || Auth::user()->role == "Hod" || Auth::user()->role == "Lecturer")
		<center><a href="{{ route('students.index') }}" class="btn btn-default">Back</a>
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
<script>



</script>

@endsection