@extends('home')

@section('stylesheet')

@section('content')

<div class="row">

	<div class="col-md-4 col-md-offset-4">

	<h4> Locked Account List </h4>
	<div class="table-responsive">
		<table class="table table-condensed">
			<thead>
				<tr>
                    <th>Name</th>
                	<th>Option Tasks</th>
                </tr>
			</thead>

			<tbody>
				@foreach($display_accList as $acc)
				<tr>
					<td>{!! $acc->name !!}</td>
					<td><a href="unlock/{!! $acc->name !!}" class="btn action btn-primary" >Unlock</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div> <!-- End of Table Responsive -->
</div>
</div> <!-- End of Row -->


@endsection