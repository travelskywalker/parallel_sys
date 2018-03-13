@if($fullpage)
	@include('pages.classes.index')
@else
	<div class="row">
		<div class="col"><b>School:</b> {{$school->name}}</div>
	</div>
	<div class="row">
		<div class="col"><b>Class:</b> {{$class->name}}</div>
	</div>
	<div class="row">
		<div class="col"><b>Description:</b> {{$class->description}}</div>
	</div>
	<div class="row">
		<div class="col"><b>Notes:</b> {{$class->notes}}</div>
	</div>
	<div class="row">
		<div class="col"><b>Status:</b> {{$class->status}}</div>
	</div>

	@include('action-menu.menu',array( 'menus'=> ['print','edit' ]) )
@endif