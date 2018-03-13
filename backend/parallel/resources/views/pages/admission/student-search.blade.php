@if(count($students) > 0 )
	<div>Select Student</div>

	 <ul class="collection">
		@foreach($students as $student)
			<li class="collection-item avatar" onclick="populateAdmissionData('{{$student->id}}')">
		      <img src="/{{$student->image}}" alt="" class="circle">
		      <span class="title"><b>{{$student->lastname}}, {{$student->firstname}}</span></b>
		      <p>{{$student->gender}}</p>
		    </li>
		@endforeach
	</ul>
@else

<div>No record found</div>
@endif
