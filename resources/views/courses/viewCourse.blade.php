@extends('home')

<!--@ section('stylesheet')-->

@section('content')


<div class="row">

<h3><b> Create Course </b></h3>
 {!! Form::open(['url'=>'create_Course']) !!}
	<div class="table-responsive">
        <table class="table table-bordered"  id="createTable">
        	<tr>
                <th>Course Name</th>
                <th>Course ID</th>
                <th>HOD-In-Charge</th>
                <th> </th>
            </tr> 

            <tr>
				<td>
                 	{!! Form::text('course_name', null, ['required', 'placeholder' => 'Enter Course Name' ,'class' => 'form-control']) !!}
                </td>

                 <td>
                	{!! Form::text('course_id', null, ['required', 'placeholder' => 'Enter Course ID' ,'class' => 'form-control']) !!}
                </td>

                <!-- <td>
                	{! ! Form::text('lecturer_id', null, ['required', 'placeholder' => 'Enter Lecturer ID' ,'class' => 'form-control']) !!}
                </td> -->


                <td>
                    <select class="form-control" name="hod_ID">
                        <option value="" disabled selected>Select HOD</option>
                        @foreach($displayhod as $display_Hod)
                        <option value="{{ $display_Hod->lecturerID }}">{{ $display_Hod->lecturerName }}</option>
                    
                        @endforeach 
                    </select>
                </td>

                <td>
                	{{Form::submit('Create Course', array('class' => 'btn btn-success btn-lg btn-block')) }}	
                </td>

            </tr>
		</table>
		
	</div> <!-- End of table-responsive -->
    		
	{!! Form::close() !!}

</div> <!-- End of Top row -->

<div class="row">

<h3><b> Course List </b></h3>
	<div class="table-responsive">
	    <table class="table table-bordered table-striped" id="courseTable">
	    	<thead>
                    <tr>
                        <th>Course Name</th>
                        <th width="150">Course ID</th>
                        <th width="200">Hod-In-Charge</th>
                    	<th width="150">Options </th>
                    </tr>
                </thead>

                <tbody>
                	@foreach($displaycourse as $courses)
                	<tr>
                		<td>{!! $courses->courseName !!}</td>
                		<td>{!! $courses->courseID !!}</td>
                		<td>{!! $courses->lecturerName !!}</td>
                    
                		<!-- <td> <a href="<//?php echo 'editCourse /'.$courses->courseID; ?>" class="btn action btn-info"><span class="glyphicon glyphicon-edit"></span>  Edit</a>  </td>-->
                        <td>
                        <a class="btn btn-primary" href="{{ route('course.edit', $courses->courseID) }}" >Edit</a>

                        {!! Form::open(['route'=>['course.destroy',$courses->courseID], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete' , ['class' => 'btn btn-danger'])!!}
                        {!! Form::close() !!} 
                        </td>
                	</tr>
                	@endforeach	
                </tbody>	

		</table>

	</div> <!-- End of table-responsive -->

</div> <!-- End of Bottom row -->

@endsection