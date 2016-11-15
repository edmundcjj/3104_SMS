@extends('home')

@section('stylesheet')

@section('content')

<div class="row">
 	<a href="{{ route('students.create') }}" class ="btn btn-primary">Add Student</a>
  <!-- route('students.create') uses from the cmd: php artisan route:list -->

	<h4> Student List </h4>

	<div class="table-responsive">
		<table class="table table-condensed">
			<thead>
				<tr>
                    <th>Student Name</th>
                    <th>Matriculation No.</th>
                    <th>NRIC</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Year of Admission</th>
                	<th>Current Status</th>
                	<th>Course</th>
                	<th>Course Code</th>
                	<th>Option Tasks</th>
                </tr>
			</thead>

			<tbody>
				@foreach($displayStudentList as $studentList)
				<tr>
					<td>{!! $studentList->studentName !!}</td>
					<td>{!! $studentList->studentID !!}</td>
					<td>{!! $studentList->student_Nric !!}</td>
					<td width="150">{!! date('d-M-Y', strtotime( $studentList->birth_Date)) !!}</td>
					<td>{!! $studentList->address !!}</td>
					<td>{!! $studentList->admission_Year !!}</td>
					<td>{!! $studentList->status !!}</td>
					<td>{!! $studentList->courseName !!}</td>
					<td>{!! $studentList->courseID !!}</td>
					<td width="220"><a href="{{ route('students.edit', $studentList->studentID) }}" class="btn action btn-info">Edit</a>

					@if($studentList->status == "Graduate")
					<a href="<?php echo URL::to( 'students/archive/' . $studentList->studentID) ?>" class="btn action btn-warning" display="inline">Archive</a>
					@endif

					{!! Form::open(['route'=>['students.destroy',$studentList->studentID], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete' , ['class' => 'btn btn-danger', 'style' => 'display:inline'])!!}
                        {!! Form::close() !!} 

					</td>
				</tr>
				@endforeach
			</tbody>

		</table>


					<div class="text-center">
				<!-- Display the Number of post per page -->
				{{ $displayStudentList->links() }}
			</div>
	</div> <!-- End of Table Responsive -->

</div> <!-- End of Row -->


@endsection