@extends('layouts.app')

@section('content')
	<table class="bordered highlight">
		<thead>
		  <tr>
		      <th>Name</th>
		      <th>Teacher</th>
		      <th>Notes</th>
		      <th>Description</th>
		  </tr>
		</thead>

		<tbody>

			@foreach ($classes as $class)
			<tr class="data-row" onclick="">
		    <td>{{$class->name}}</td>
		    <td>{{$class->teacher_id}}</td>
		    <td>{{$class->notes}}</td>
		    <td>{{$class->description}}</td>
		  </tr>
			@endforeach
		</tbody>
	</table>
@endsection