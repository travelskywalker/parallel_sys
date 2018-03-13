@if($fullpage)
	@include('pages.teacher.index')
@else
	<div class="form-details">
		<div class="row">
    		<div class="col s4">
    			<div class="image-container" @if($teacher->image != null) style="background: url('/{{$teacher->image}}')" @endif></div>
    		</div>
    		<div class="col s8">
    			<div class="col s12">
			  		<div class="input-field col s6">
			          <input id="teachernumber" type="number" class="validate" value="{{$teacher->teachernumber}}" disabled>
			          <label for="teachernumber">Teacher Number</label>
					</div>
			  	</div>
			  	<div class="col s12">
			  			<div class="input-field col s6">
						<input id="licensenumber" name="licensenumber" type="number" class="validate" value="{{$teacher->licensenumber}}" disabled>
			          <label for="licensenumber">License Number</label>
					</div>
			  	</div>
    			
    		</div>
    	</div>
    	<div class="row">
    		<div class="col s12">
		  		<div class="input-field col s4">
		          <input id="firstname" name="firstname" type="text" class="validate" value="{{$teacher->firstname}}" disabled>
		          <label for="firstname">First Name</label>
				</div>
				<div class="input-field col s4">
		          <input id="middlename" name="middlename" type="text" class="validate" value="{{$teacher->middlename}}" disabled>
		          <label for="middlename">Middle Name</label>
				</div>
				<div class="input-field col s4">
		          <input id="lastname" name="lastname" type="text" class="validate" value="{{$teacher->lastname}}" disabled>
		          <label for="lastname">Last Name</label>
				</div>
		  	</div>
   
      			<div class="col s12">
			          <div class="input-field col s12">
			            <textarea id="admission_notes" name="notes" class="materialize-textarea" data-length="120" disabled>{{$teacher->notes}}</textarea>
			            <label for="admission_notes">Notes</label>
			          </div>
      			</div>
      			<div class="col s12">
			          <div class="input-field col s12">
			            <textarea id="admission_description" name="description" class="materialize-textarea" data-length="120" disabled="">{{$teacher->description}}</textarea>
			            <label for="admission_description">Description</label>
			          </div>
      			</div>
      
    	</div>

    	@include('action-menu.menu',array( 'menus'=> ['print','edit' ]) )

@endif