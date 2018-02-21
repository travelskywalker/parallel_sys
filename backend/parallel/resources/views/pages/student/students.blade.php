@extends('layouts.app')


@section('content')
	<table class="bordered highlight">
		<thead>
		  <tr>
		  	  <th>Student Number</th>
		      <th>Name</th>
		      <th>Gender</th>
		      <th>Birthdate</th>
		      <th>Address</th>
		      <th>Father</th>
		      <th>Mother</th>
		      <th>Guardian</th>
		      <th>Emergency #</th>
		      <th>Nationality</th>
		      <th>Religion</th>
		      <th>Notes</th>
		      <th>Description</th>
		      <th>Status</th>
		  </tr>
		</thead>

		<tbody>

			@foreach ($students as $student)
			<tr class="data-row" onclick="showDetails('student', {{$student->id}})">
			<td>{{$student->student_number}}</td>
			<td>{{$student->firstname}} {{$student->middlename}} {{$student->lastname}}</td>
			<td>{{$student->gender}}</td>
			<td>{{$student->birthdate}}</td>
			<td>{{$student->address}}</td>
			<td>{{$student->fathersname}}</td>
			<td>{{$student->mothersname}}</td>
			<td>{{$student->guardianname}}</td>
			<td>{{$student->emergencycontactnumber}}</td>
			<td>{{$student->nationality}}</td>
			<td>{{$student->religion}}</td>
			<td>{{$student->notes}}</td>
			<td>{{$student->description}}</td>
			<td>{{$student->status}}</td>
		  </tr>
			@endforeach
		</tbody>
	</table>
@endsection