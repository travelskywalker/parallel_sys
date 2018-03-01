@if($fullpage)
	@include('pages.admission.index')
@else
<div id="app-main">
	<table class="bordered highlight">
		<thead>
		  <tr>
		  	@if(Auth::user()->access_id == 0)<th>School</th>@endif
		  	<th>Date</th>
		  	<th>Name</th>
		     <th>Status</th>
		  </tr>
		</thead>

		<tbody>

			@foreach ($admissions as $admission)
			<tr class="data-row" onclick="showDetails('admission',{{$admission->id}})">
		    @if(Auth::user()->access_id == 0)<td>{{$admission->school_name}}</td>@endif
		    <td>{{$admission->date}}</td>
		    <td>{{$admission->firstname}} {{$admission->lastname}}</td>
		    <td>{{$admission->status}}</td>
		  </tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif
