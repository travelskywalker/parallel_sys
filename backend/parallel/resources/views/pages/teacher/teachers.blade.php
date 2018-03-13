@if($fullpage)
	@include('pages.teacher.index')
@else
<h5>Teachers</h5>
	@if(count($teachers) > 0)
		<table class="bordered highlight">
			<thead>
			  <tr>
			  	  <th>Teacher Number</th>
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
			    <td>@if($teacher->image != null) <div class="thumb-image-container" style="background:url('{{$teacher->image}}')"></div> @endif {{$teacher->firstname}} {{$teacher->lastname}}</td>
			    @if(Auth::user()->access_id == 0)<td>{{$teacher->school_name}}</td>@endif
			    <td>{{$teacher->notes}}</td>
			    <td>{{$teacher->description}}</td>
			    <td>{{$teacher->status}}</td>
			  </tr>
				@endforeach
			</tbody>
		</table>

		@include('action-menu.menu',array( 'menus'=> ['print','add' ]) )
		
	@else
		No record in the database. Click <a href="/teacher/add">here</a> to add.
	@endif

@endif