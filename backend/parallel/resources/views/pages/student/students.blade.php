@if($fullpage)
	@include('pages.student.index')
@else
<h5>Students</h5>
	
	@if(count($students) > 0)
		<table class="bordered highlight">
			<thead>
			  <tr>
			  	  @if(Auth::user()->access_id == 0)<th>School</th>@endif
			  	  <th>Student Number</th>
			      <th>Name</th>
			      <th>Gender</th>
			      <th>Birthdate</th>
			      <th>Address</th>
			      <th>Father</th>
			      <th>Mother</th>
			      <th>Guardian</th>
			      <th>Emergency #</th>
			      <!-- <th>Nationality</th>
			      <th>Religion</th>
			      <th>Notes</th>
			      <th>Description</th>
			      <th>Status</th> -->
			  </tr>
			</thead>

			<tbody>
				@foreach ($students as $student)
				<tr class="data-row" onclick="showDetails('student', {{$student->id}})">
				@if(Auth::user()->access_id == 0)<th>{{$student->school_name}}</th>@endif
				<td>{{$student->studentnumber}}</td>
				<td>{{$student->lastname}} {{$student->firstname}} </td>
				<td>{{$student->gender}}</td>
				<td>{{Carbon\Carbon::parse($student->birthdate)->format('M d, Y')}}</td>
				<td>{{$student->address}}</td>
				<td>{{$student->fathersname}}</td>
				<td>{{$student->mothersname}}</td>
				<td>{{$student->guardianname}}</td>
				<td>{{$student->emergencycontactnumber}}</td>
				<!-- <td>{{$student->nationality}}</td>
				<td>{{$student->religion}}</td>
				<td>{{$student->notes}}</td>
				<td>{{$student->description}}</td>
				<td>{{$student->status}}</td> -->
			  </tr>
				@endforeach
			</tbody>
		</table>

		@include('action-menu.menu',array( 'menus'=> ['print' ]) )
	@else
		No record in the database. Click <a href="/admission/new">here</a> for new admission.
	@endif
@endif