@if($fullpage)
	@include('pages.classes.index')
@else
<h5>Classes</h5>
	@if(count($classes) >0)
		<table class="bordered highlight">
			<thead>
			  <tr>
			      @if(Auth::user()->access_id == 0)<th>School</th>@endif
			      <th>Class</th>
			      <th>Notes</th>
			      <th>Description</th>
			      <th>Status</th>
			  </tr>
			</thead>

			<tbody>

				@foreach ($classes as $class)
				<tr class="data-row" onclick="showDetails('classes',{{$class->id}})">
			    @if(Auth::user()->access_id == 0)<td>{{$class->school_name}}</td>@endif
			    <td>{{$class->name}}</td>
			    <td>{{$class->notes}}</td>
			    <td>{{$class->description}}</td>
			    <td>{{$class->status}}</td>
			  </tr>
				@endforeach
			</tbody>
		</table>

		@include('action-menu.menu',array( 'menus'=> ['print','add' ]) )
		
	@else
		No record in the database. Click <a href="/classes/add">here</a> to add.
	@endif
@endif