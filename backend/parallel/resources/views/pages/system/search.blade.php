@if(count($schools) > 0 || count($students) > 0 || count($teachers) > 0 || count($classes) > 0 || count($sections) > 0)
<div class="search-prompt">Records found matching "<b class="search-key">key</b>"</div>
@else
<div class="search-prompt">No match found containing "<b class="search-key">key</b>"</div>
@endif

@if(count($schools) > 0 &&  Auth::user()->access_id == 0)
<div class="row s12">
<h5>School</h5>
	<ul class="collection staggered">
		@foreach ($schools as $school)
		<li class="collection-item hoverable" onclick="showDetails('school',{{$school->id}})">{{$school->name}}</li>
		@endforeach
	</ul>
</div>
@endif

@if(count($students) > 0)
<div class="row s12">
<h5>Student</h5>
	<ul class="collection staggered">
		@foreach ($students as $student)
		<li class="collection-item" onclick="showDetails('student',{{$student->id}})">{{$student->firstname}} {{$student->lastname}}</li>
		@endforeach
	</ul>
</div>
@endif

@if(count($teachers) > 0)
<div class="row s12">
<h5>Teacher</h5>
	<ul class="collection staggered">
		@foreach ($teachers as $teacher)
		<li class="collection-item" onclick="showDetails('teacher',{{$teacher->id}})">{{$teacher->firstname}} {{$teacher->lastname}}</li>
		@endforeach
	</ul>
</div>
@endif

@if(count($classes) > 0)
<div class="row s12">
<h5>Classes</h5>
	<ul class="collection staggered">
		@foreach ($classes as $class)
		<li class="collection-item" onclick="showDetails('classes',{{$class->id}})">{{$class->name}}</li>
		@endforeach
	</ul>
</div>
@endif

@if(count($sections) > 0)
<div class="row s12">
<h5>Section</h5>
	<ul class="collection staggered">
		@foreach ($sections as $section)
		<li class="collection-item" onclick="showDetails('section',{{$section->id}})">{{$section->name}}</li>
		@endforeach
	</ul>
</div>
@endif