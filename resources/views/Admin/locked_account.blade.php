@extends('home')

@section('stylesheet')

@section('content')
	
	<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="text-align: center;">
                <div class="panel-heading">	<h4> Locked Account List </h4></div>
                <div class="panel-body">
                		<div class="table-responsive" >
		<table class="table table-condensed">
			<thead align="centre">
				<tr>
                    <th >Name</th>
                	<th >Option Tasks</th>
                </tr>
			</thead>

			<tbody align="left">
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
            </div>
        </div>
    </div>
</div>



@endsection