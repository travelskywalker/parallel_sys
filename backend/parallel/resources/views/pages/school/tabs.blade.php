<li class="tab" id="data-index" url="/school"><a class="@if($page == 'index') active @endif waves-effect">Manage</a></li>
@if(Auth::user()->access_id == 0) 
<li class="tab" id="data-add" url="/school/add"><a class="@if($page == 'add') active @endif waves-effect">Add</a></li> 
@endif