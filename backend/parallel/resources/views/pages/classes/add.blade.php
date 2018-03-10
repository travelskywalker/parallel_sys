@if($fullpage)
	@include('pages.classes.index')
@else
<h5 class="left">Add Class</h5>
<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>


	<form id="add_class_form">

		<div class="row s12">
		    <div class="col s12">
		      <div class="card hoverable">
		        <div class="card-content">
		        	<div class="row">
			        	<div class="col s12">
		        			<div class="input-field col s12">
							    <select id="school_id" name="school_id">
							      		@if(Auth::user()->access_id == 0)<option value="" disabled selected>select school</option>@endif
							      		@foreach($schools as $school)
							      			<option value="{{$school->id}}">{{$school->name}}</option>
							      		@endforeach
							    </select>
							    <label>School</label>
							</div>
						</div>
					</div>

		        	<div class="row">
		        		<div class="col s12">
					  		<div class="input-field col s12">
					          <input id="name" name="name" type="text" class="validate">
					          <label for="name">Class Name</label>
							</div>
					  	</div>
		        	</div>
		        	<div class="row">
			        	<div class="col s12">
		        			<div class="input-field col s12">
							    <select id="teacher_id" name="teacher_id">
							      		@if(Auth::user()->access_id == 0)<option value="" disabled selected>select teacher</option>@endif
							      		@foreach($teachers as $teacher)
							      			<option value="{{$teacher->id}}">{{$teacher->firstname}} {{$teacher->lastname}}</option>
							      		@endforeach
							    </select>
							    <label>Teacher</label>
							</div>
						</div>
					</div>
		        	
					
					<div class="row">
		          			<div class="col s12">
						          <div class="input-field col s12">
						            <textarea id="admission_notes" name="notes" class="materialize-textarea" data-length="120"></textarea>
						            <label for="admission_notes">Notes</label>
						          </div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s12">
						          <div class="input-field col s12">
						            <textarea id="admission_description" name="description" class="materialize-textarea" data-length="120"></textarea>
						            <label for="admission_description">Description</label>
						          </div>
		          			</div>
		          		</div>

		          		<input id="status" name="status" type="hidden" value="active">
		          
		        </div>
		        <div class="card-action">
		          <div class="row">
			  		<a class="waves-effect waves-light btn" onclick="sendForm('add_class_form','/api/class/new','classes')">Submit</a>
			  	</div>
		        </div>
		      </div>
		    </div>
		  </div>
	</form>
@endif