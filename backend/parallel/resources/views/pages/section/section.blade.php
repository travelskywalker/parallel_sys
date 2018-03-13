@if($fullpage)
	@include('pages.section.index')
@else
	<div class="row">
		<div class="col"><b>Class:</b> {{$classes->name}}</div>
	</div>
	<div class="row">
		<div class="col s8"><b>Section:</b> {{$section->name}}</div>
		<div class="col s4"><b>Time:</b> {{date('h:i a', strtotime($section->timefrom))}} - {{date('h:i a', strtotime($section->timeto))}}</div>
	</div>
	<div class="row">
		<div class="col s8"><b>Adviser:</b> @if($teachers) {{$teachers->firstname}} {{$teachers->lastname}} @endif</div>
		<div class="col s4"><b>Student Limit:</b> {{$section->studentlimit}}</div>
	</div>
	<div class="row">
		<div class="row"><div class="col">Students</div></div>
		<div class="row">
			<div class="col">students</div>
		</div>
	</div>

	@include('action-menu.menu',array( 'menus'=> ['print','edit' ]) )
@endif