@extends('home')

@section('stylesheet')

@section('content')

<div class="row">
	<h4> Backup Operation </h4>

	<div class="table-responsive">

		<table class="table table-condensed">
			<thead>
				<tr>
                    <th>Description</th>
                    <th>Operation</th>
                </tr>
			</thead>

			<tbody>
				<tr>
					<td>Admin backups application project files daily and monthly</td>
					<td width="220"><a href="{{ url('backup_application')}}" class="btn action btn-info">Backup Application</a></td>
				</tr>
				<tr>
					<td>Admin backups database files daily and monthly</td>
					<td width="220"><a href="{{ url('backup_database')}}" class="btn action btn-info">Backup Database</a></td>
				</tr>
			</tbody>

		</table>

	</div> <!-- End of Table Responsive -->

</div> <!-- End of Row -->


@endsection