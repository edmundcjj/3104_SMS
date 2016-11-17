@extends('home')

@section('stylesheet')

@section('content')

<div class="row">
 	<a href="{{ route('lecturers.create') }}" class ="btn btn-primary">Add Lecturer</a>
 	

	<h4> Lecturer List </h4>

	<div class="table-responsive">
		<table class="table table-condensed">
			<thead>
				<tr>
				<th>Lecturer Name</th>
				<th>Lecturer ID</th>
				<th>NRIC</th>
				<th>Date of Birth</th>
				<th>Address</th>
				<th>Position</th>
				<th>Option Task</th>
				</tr>
			</thead>

			<tbody>
				@foreach($display_LectList as $lecturer)
				<tr>
					<td>{!! $lecturer->lecturerName !!}</td>					
					<td>{!! $lecturer->lecturerID !!}</td>
					<td>{!! $lecturer->lecturer_Nric !!}</td>
					<td>{!! $lecturer->birth_Date !!}</td>
					<td>{!! $lecturer->address !!}</td>
					<td>{!! $lecturer->position !!}</td>
					<td><a href="{{ route('lecturers.edit', $lecturer->lecturerID) }}" class="btn action btn-info">Edit</a>

					{!! Form::open(['route'=>['lecturers.destroy',$lecturer->lecturerID], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
					{!! Form::submit('Delete' , ['class' => 'btn action btn-danger'])!!}
					{!! Form::close() !!} 

					</td>
				</tr>
				@endforeach
			</tbody>

		</table>


					<div class="text-center">
				<!-- Display the Number of post per page -->
				{{ $display_LectList->links() }}
			</div>
	</div> <!-- End of Table Responsive -->

</div> <!-- End of Row -->


@endsection