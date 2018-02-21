@extends('layouts.app')

@section('title')
Teacher
@endsection

@section('content')
	<table class="bordered highlight">
		<thead>
		  <tr>
		  	  <th>ID Number</th>
		      <th>Name</th>
		      @if(Auth::user()->access_id == 0)<th>School</th> @endif
		      <th>Notes</th>
		      <th>Description</th>
		      <th>Status</th>
		  </tr>
		</thead>

		<tbody>

			@foreach ($teachers as $teacher)
			<tr class="data-row" onclick="showDetails('teacher', {{$teacher->id}})">
			<td>{{$teacher->teachernumber}}</td>
		    <td><img src="{{$teacher->image}}" width="40" height="40"> {{$teacher->firstname}} {{$teacher->lastname}}</td>
		    <td>{{$teacher->school_name}}</td>
		    <td>{{$teacher->notes}}</td>
		    <td>{{$teacher->description}}</td>
		    <td>{{$teacher->status}}</td>
		  </tr>
			@endforeach
		</tbody>
	</table>
@endsection