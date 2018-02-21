@extends('layouts.app')
@section('title')
Sections
@endsection
@section('content')
	<table class="bordered highlight">
		<thead>
		  <tr>
		      <th>Name</th>
		      <th>Teacher</th>
		      <th>Time From</th>
		      <th>Time To</th>
		      <th>Room</th>
		      <th>Student limit</th>
		      <th>Class</th>
		      @if(Auth::user()->access_id == 0)<th>School</th>@endif
		      <th>Notes</th>
		      <th>Description</th>
		      <th>Status</th>
		  </tr>
		</thead>

		<tbody>

			@foreach ($sections as $section)
			<tr class="data-row" onclick="showDetails('section',{{$section->id}})">
		    <td>{{$section->name}}</td>
		    <td>{{$section->teacher_firstname}} {{$section->teacher_lastname}}</td>
		    <td>{{$section->timefrom}}</td>
		    <td>{{$section->timeto}}</td>
		    <td>{{$section->room}}</td>
		    <td>{{$section->studentlimit}}</td>
		    <td>{{$section->class_name}}</td>
		    @if(Auth::user()->access_id == 0)<td>{{$section->school_name}}</td>@endif
		    <td>{{$section->notes}}</td>
		    <td>{{$section->description}}</td>
		    <td>{{$section->status}}</td>
		  </tr>
			@endforeach
		</tbody>
	</table>
@endsection