@if($fullpage)
	@include('pages.user.index')
@else
	<h5>Users</h5>
		<table class="bordered highlight">
			<thead>
			  <tr>
			  	  <th>Name</th>
			      <th>Email</th>
			      <th>Access</th>
			      @if(Auth::user()->access_id == 0)<th>School</th>@endif
			  </tr>
			</thead>

			<tbody>
				@foreach ($users as $user)
				<tr class="data-row row-{{$user->id}}" data-id="{{$user->id}}" onclick="">
				<td>{{$user->name}}</td>
			    <td>{{$user->email}}</td>
			    <td>{{$user->access_name}}</td>
			   @if(Auth::user()->access_id == 0) <td>{{$user->school_name}}</td>@endif
			    <!-- <td width="40"><i class="material-icons data-edit-btn" title="edit" onclick="editDetails('user',{{$user->id}})">edit</i></td> -->
			    <td width="40"><i class="material-icons data-edit-btn" title="edit" onclick="openEditModal('/user/edit/{{$user->id}}')">edit</i></td>
			  </tr>
				@endforeach
			</tbody>
		</table>
@endif
