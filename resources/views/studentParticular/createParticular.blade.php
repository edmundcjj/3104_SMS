@extends('home')

@section('stylesheet')

@section('content')

<div class="row">
<div class="col-md-2"></div>
 <div class="col-md-8">

 {!! Form::open(['route' => 'students.store']) !!}

	
<div class="form-group">
	{!! Form::label('studentName', 'Full Name:') !!}
    {!! Form::text('studentName', null, ['class' => 'form-control', 'required' ,'placeholder' => 'Enter Name']) !!}
</div>

<div class="form-group">
	{!! Form::label('studentNRIC', 'NRIC:') !!}
	{!! Form::text('studentNRIC', null, ['class' => 'form-control', 'required' ,'placeholder' => 'Enter NRIC', 'maxlength' => '9']) !!}
</div>


<div class="form-group">
	{!! Form::label('student_id', 'Matriculation Number:') !!}
	{!! Form::text('student_id', null, ['class' => 'form-control', 'required' ,'placeholder' => 'Enter Matriculation No.', 'maxlength' => '7']) !!}
</div>

<div class="form-group">
{!! Form::label('student_Pass', 'Password:') !!}
<div class="input-group input-group-unstyled">
<!-- { !! Form::password('student_Pass', array('class' => 'form-control', 'required' ,'placeholder' => 'Enter Password' )) !!} -->
<input class="form-control" type="password"  name="student_Pass" id="student_Pass" placeholder="Enter Password">
<span class="input-group-addon">
<i class="glyphicon glyphicon-eye-open" name="eye" id="eye"></i>
</span>
</div>
</div>



<div class="form-group">
	{!! Form::label('student_email', 'E-Mail Address:') !!}
	{!! Form::text('student_email', null, ['required', 'class'=>'form-control', 'placeholder'=>'Enter E-Mail Address']) !!}
</div>


<div class="form-group">
	{!! Form::label('student_address', 'Address:') !!}
	{!! Form::text('student_address', null, ['required' ,'class' => 'form-control', 'placeholder' => 'Enter Address']) !!}
</div>


<div class="form-group">
	{!! Form::label('birthDate', 'Date of Birth:') !!}
	{!! Form::text('birthDate', null, ['required','readonly','class' => 'form-control datepicker', 'style' => 'width:280px']) !!}
</div>


<div class="form-group">
	{!! Form::label('admissionYear', 'Admission Year:') !!}
	{!! Form::selectYear('admissionYear', 2015, 2025, ['class' => 'form-control']) !!}
</div>

        
<div class="form-group">
    {!! Form::label('student_status', 'Status:') !!}
	{!! Form::select('student_status', array( 'Pre Enroll' => 'Pre Enroll'  ,'Enroll' => 'Enroll'), null, ['class' => 'form-control','style' => 'width:200px'] )  !!}
</div>

<div class="form-group">
	{!! Form::label('course_id', 'Course:') !!}
	<!-- {! ! Form::select('course_id', array($displayCourse->courseName)) !!} -->
	<select class="form-control" name="course_id">
	<option value="" disabled selected>Select Course</option>
	 @foreach($displayCourse as $display_C)
		<option value="{{ $display_C->courseID }}">{{ $display_C->courseName }}</option>
	@endforeach 
	</select>
</div>


<div class="form-group"><center>
    {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
</center></div>



{!!Form::close()!!}
</div> <!-- End of col-md-8 -->

<div class="col-md-2"></div>
</div> <!-- End of Top Row -->
@endsection

@section('scripts')
{{ Html::script('js/script.js') }}
@endsection