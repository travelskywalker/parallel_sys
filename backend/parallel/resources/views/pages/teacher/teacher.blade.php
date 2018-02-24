
	<div class="card">
		<div class="card-image waves-effect waves-block waves-light">
		  <img class="activator" src="{{$teacher->image}}">
		</div>
		<div class="card-content">
		  <span class="card-title activator grey-text text-darken-4">{{$teacher->firstname." ".$teacher->lastname}}<i class="material-icons right">more_vert</i></span>
		  @if($teacher->licensenumber)<p><b>License Number:</b> {{$teacher->licensenumber}}</p>@endif
		  @if($teacher->teachernumber)<p><b>ID Number:</b> {{$teacher->teachernumber}}</p>@endif
		  
		  <p><b>status:</b> {{$teacher->status}}</p>

		  <div class="row"></div>
		  <div class="row">
		  	<b>Teaching Load:</b> {{count($sections)}}
		  	
		  	@if(count($sections) > 0))
			  <table class="bordered highlight">
				<thead>
				  <tr>
				  	  <th>Section</th>
				  	  <th>Class</th>
				      <th>Time From</th>
				      <th>Time To</th>
				      <th>Notes</th>
				      <th>Description</th>
				      <th>Status</th>
				  </tr>
				</thead>
				<tbody>
				@foreach($sections as $section)
				<tr>
					<td>{{$section->name}}</td>
					<td></td>
					<td>{{date('h:i a', strtotime($section->timefrom))}}</td>
					<td>{{date('h:i a', strtotime($section->timeto))}}</td>
					<td>{{$section->notes}}</td>
					<td>{{$section->description}}</td>
					<td>{{$section->status}}</td>
				</tr>
				@endforeach
				</tbody>
			</table>
			@endif
		</div>

		</div>
		<div class="card-reveal">
		  <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
		  <p>Here is some more information about this product that is only revealed once clicked on.</p>
		</div>
	</div>