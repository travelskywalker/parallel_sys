<div class="fixed-action-btn horizontal" >
	<a class="btn-floating btn-large waves-effect btn-menu">
	  <i class="large material-icons">menu</i>
	</a>
	<ul>

	 @if(in_array('add', $menus))
	  <li>
	  	<a class="btn-floating waves-effect btn-add" onclick="addBtn()" title="add"><i class="material-icons">add</i></a>
	  </li>
	  @endif

	  @if(in_array('edit', $menus))
	  <li>
	  	<a class="btn-floating waves-effect btn-edit" onclick="editBtn()" title="edit"><i class="material-icons">edit</i></a>
	  </li>
	  @endif

	  @if(in_array('print', $menus))
	  <li>
	  	<a class="btn-floating waves-effect btn-print" onclick="printBtn();" title="print"><i class="material-icons">print</i></a>
	  </li>
	 @endif

	</ul>
</div>
