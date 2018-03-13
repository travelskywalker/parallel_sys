@if($fullpage)
	@include('pages.school.index')
@else
<h5>Schools</h5>
	@if(count($schools) > 0)
		<table class="bordered highlight fade-in-table">
			<thead>
			  <tr>
			  	  <th></th>
			      <th>Name</th>
			      <th>Administrator</th>
			      <th>Address</th>
			      <th>Email</th>
			      <th>Phone Number</th>
			      <th>Mobile Number</th>
			      <th>Status</th>
			  </tr>
			</thead>
			<tbody>
				@foreach ($schools as $school)
				<tr class="data-row" onclick="showDetails('school',{{$school->id}})">
				<td><div class="square image-thumbmark small materialboxed" style="background: url('/{{$school->logo}}');"></div></td>
			    <td>{{$school->name}}</td>
			    <td>{{$school->admin}}</td>
			    <td>{{$school->address}}</td>
			    <td>{{$school->email}}</td>
			    <td>{{$school->phonenumber}}</td>
			    <td>{{$school->mobilenumber}}</td>
			    <td>{{$school->status}}</td>
			  </tr>
				@endforeach
			</tbody>
		</table>
		
		@include('action-menu.menu',array( 'menus'=> ['print','add' ]) )

	@else
		No record in the database. Click <a href="/school/add">here</a> to add.
	@endif


@endif