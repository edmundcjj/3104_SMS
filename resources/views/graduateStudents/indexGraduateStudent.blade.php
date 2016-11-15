@extends('home')

@section('stylesheet')

@section('content')


<div class="row">

	<div class="table-responsive">
		<table class="table table-condensed">
			<thead>
				<tr>
                    <th>Student Name</th>
                    <th>Matriculation No.</th>
                    <th>NRIC</th>
                    <th>Year of Admission</th>
                	<th>Course ID </th>
                	<th>View Results</th>
                </tr>
			</thead>

			<tbody>
				@foreach($gradStudents as $grad_students)
				<tr>
					
					<td>{!! $grad_students->alumniName !!}</td>
					<td>{!! $grad_students->alumniID !!}</td>
					<td>{!! $grad_students->nric !!}</td>
					<td>{!! $grad_students->addmissionYear !!}</td>
					<td>{!! $grad_students->courseID !!}</td>
					<td> <a href="{{ URL::to('graduate_Students/view/'. $grad_students->alumniID) }}" class="btn action btn-info">View</a> </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

		
</div> <!-- End of row -->

@endsection