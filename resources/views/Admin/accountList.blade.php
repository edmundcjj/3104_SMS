@extends('home')

@section('stylesheet')

@section('content')



<div class="row">

<ul class="tab">
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Student_List')" id="defaultOpen">Student</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Lecturer_List')">Lecturers</a></li>

	<li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Hod_List')">HOD</a></li>
  
</ul>



<div id="Student_List" class="tabcontent">
  	<div class="table-responsive">
		<table class="table table-condensed">

			<thead>
				<tr>
					<th> Student Name </th>
                    <th> Student ID </th>
                    <th> Email </th>
					<th> Password Expire Date </th>               
                	<th> Grace Period </th>
                	<th> Options </th>
                </tr>
			</thead>

			<tbody>
				@foreach($studentAcc as $student_acc)

			  		@if((strtotime($currentDate) - strtotime($student_acc->password_date))/(86400) >= 80)
					<tr>
						<td> {!! $student_acc->studentName !!} </td>
					    <td> {!! $student_acc->studentID !!} </td>
					    <td> {!! $student_acc->email !!} </td>
						<td> {!! date('d M Y', strtotime( $student_acc->password_date. '+ 90 days')) !!} </td>
						<td> {!! (strtotime($currentDate) - strtotime($student_acc->password_date))/(86400) !!} </td>
						<td> <a href="{{ URL::to('/sendEmail/'. $student_acc->studentName . '/' .$student_acc->email) }}" class="btn action btn-info">Send EMail</a></td>
						  
					</tr>

					@endif
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div id="Lecturer_List" class="tabcontent">
		<div class="table-responsive">
		<table class="table table-condensed">

			<thead>
				<tr>
                    <th> Lecturer Name </th>
                    <th> Lecturer ID </th>
                    <th> Email </th>
                 	<th> Password Expire Date </th>
                	<th> Grace Period </th>
                	<th> Options </th>
                </tr>
			</thead>

				<tbody>
				@foreach($lecturerAcc as $lecturer_acc)

					 @if($lecturer_acc->position == "Staff")
					 @if((strtotime($currentDate) - strtotime($lecturer_acc->password_date))/(86400) >= 80)			
					 <tr>
						<td> {!! $lecturer_acc->lecturerName !!} </td>
						<td> {!! $lecturer_acc->lecturerID !!} </td>
						<td> {!! $lecturer_acc->email !!} </td>
						<td> {!! date('d M Y', strtotime( $lecturer_acc->password_date. '+ 90 days')) !!} </td>
						<td> {!! (strtotime($currentDate) - strtotime($lecturer_acc->password_date))/(86400) !!} </td>
						<td> <a href="{{ URL::to('/sendEmail/'. $lecturer_acc->lecturerName . '/' . $lecturer_acc->email  ) }}" class="btn action btn-info">Send EMail</a> </td>
					</tr>
					@endif
					 @endif
				@endforeach
			</tbody>


		</table>
	</div>  

  </div>

	<div id="Hod_List" class="tabcontent">
		<div class="table-responsive">
			<table class="table table-condensed">

				<thead>
				<tr>
					<th> Lecturer Name </th>
					<th> Lecturer ID </th>
					<th> Email </th>
					<th> Password Expire Date </th>
					<th> Grace Period </th>
					<th> Options </th>
				</tr>
				</thead>

				<tbody>
				@foreach($lecturerAcc as $lecturer_acc)
					@if($lecturer_acc->position == "Hod")
					@if((strtotime($currentDate) - strtotime($lecturer_acc->password_date))/(86400) >= 80)
						<tr>
							<td> {!! $lecturer_acc->lecturerName !!} </td>
							<td> {!! $lecturer_acc->lecturerID !!} </td>
							<td> {!! $lecturer_acc->email !!} </td>
							<td> {!! date('d M Y', strtotime( $lecturer_acc->password_date. '+ 90 days')) !!} </td>
							<td> {!! (strtotime($currentDate) - strtotime($lecturer_acc->password_date))/(86400) !!} </td>
							<td> <a href="{{ URL::to('/sendEmail/'. $lecturer_acc->lecturerName . '/' . $lecturer_acc->email  ) }}" class="btn action btn-info">Send EMail</a> </td>
						</tr>
					@endif
					@endif
				@endforeach
				</tbody>


			</table>
		</div>

	</div>



	



</div>



<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>


@endsection


