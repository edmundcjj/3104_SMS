@extends('home')

@section('title', '| Grades')

@section('stylesheets')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection

@section('content')


	<div class="row">
		@if(Session::has('error'))
			<div class="alert alert-danger">{{ Session::get('error') }}</div>
		@endif
		<div class="col-md-2"></div>
		<div class="col-md-8">
			@foreach($editgrade as $grade)

				{{ Form::open(['url' => array('grades_details_update', $grade->resultID)]) }}

				<div class="form-group">
					{!! Form::label('student_matric', 'Student Matric:', ['class' => 'control-label']) !!}
					{!! Form::text('student_matric', $grade->studentID, ['readonly', 'class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('grade', 'Grade:', ['class' => 'control-label']) !!}
					{!! Form::text('grade', $grade->grade, ['required', 'class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('recommendation', 'Recommendation:', ['class' => 'control-label']) !!}
					{!! Form::text('recommendation', $grade->recommendation, ['class' => 'form-control']) !!}
				</div>


				{!! Form::submit('Update Grade', ['class' => 'btn btn-success']) !!}
				{{ Form::close() }}
			@endforeach


		</div>
		<div class="col-md-2"></div>
	</div>
@endsection