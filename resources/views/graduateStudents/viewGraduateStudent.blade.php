@extends('home')

@section('stylesheet')

@section('content')

<div class="row">
	<h3> Graduate Information </h3>

	<div class="table-responsive" >
		<table class="table table-condensed archiveResultTable">

			<thead>
				<tr>
                    <th>No. </th>
                    <th>Module Name</th>
                    <th>Module Code</th>
                    <th>Name of Test</th>
                    <th>Grades</th>
                    
                </tr>
			</thead>

			<tbody>
				@foreach($viewGrad_Info as $viewGrad_info)
					<tr height="40px">
						<td class="label_num"> </td>
						<td> {!! $viewGrad_info->moduleName !!} </td>
						<td> {!! $viewGrad_info->moduleID !!} </td>
						<td> {!! $viewGrad_info->testName !!} </td>
						<td> {!! $viewGrad_info->grade !!} </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
			<center><a href="{{ URL::to('/graduate_Students') }}" class="btn btn-default">Back</a></center>

</div> <!-- End of row -->


@endsection