@extends('home')


@section('content')

<div class="row">
<div class="col-md-2"></div>
	<div class="col-md-8">
	@foreach($edit_course as $editCourse)

	{{ Form::model($editCourse, array('route' => array('course.update', $editCourse->courseID), 'method' => 'PUT')) }}

	<div class="form-group">
			{!! Form::label('course_name', 'Course Name:', ['class' => 'control-label']) !!}
			{!! Form::text('course_name', $editCourse->courseName, ['required', 'class' => 'form-control']) !!}
	</div>


	<div class="form-group">
			{!! Form::label('course_id', 'Course ID:', ['class' => 'control-label']) !!}
			{!! Form::text('course_id', $editCourse->courseID, ['readonly', 'class' => 'form-control']) !!}
	</div>

	<div class="form-group">
	{!! Form::label('lecturer_id', 'HOD-In-Charge:') !!}
		<select class="form-control" name="lecturer_id">
			<option value="{{ $editCourse->lecturerID }}">{{ $editCourse->lecturerName }}</option>
	 		@foreach($edit_hod as $edit_h)
			<option value="{{ $edit_h->lecturerID }}">{{ $edit_h->lecturerName }}</option>

			@endforeach
		</select>
</div> 
 

<!-- 	{ { $editCourse->courseID}} { { $editCourse->courseName}} { { $editCourse->lecturerID }} -->


	<center>{!! Form::submit('Update Course', ['class' => 'btn btn-success']) !!}</center>
	
	@endforeach

	{{ Form::close() }}
	</div>
	<div class="col-md-2"></div>
</div>
@endsection