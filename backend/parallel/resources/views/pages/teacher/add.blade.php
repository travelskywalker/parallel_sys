@if($fullpage)
	@include('pages.teacher.index')
@else
<h5 class="left">New Teacher</h5>
<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>


<form id="add_photo" style="display: none">
<input id="image_upload" container="image_container" form-input="image" name="image" fdata="add_photo" api="/temp/imageupload" type="file" accept="image/*">
</form>

	<form id="add_teacher_form">
		<input type="hidden" name="image" id="image">

		<div class="row s12">
		    <div class="col s12">
		      <div class="card hoverable">
		        <div class="card-content">
		        	<div class="row">
		        		<div class="col s4">
		        			<div class="add-image-container" id="image_container" activates="image_upload">please upload square photo to ensure image compatibility</div>
		        		</div>
		        		<div class="col s8">
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
		        			<div class="col s12">
						  		<div class="input-field col s6">
						          <input id="teachernumber" name="teachernumber" type="number" class="validate">
						          <label for="teachernumber">Teacher Number</label>
								</div>
						  	</div>
						  	<div class="col s12">
						  			<div class="input-field col s6">
									<input id="licensenumber" name="licensenumber" type="number" class="validate">
						          <label for="licensenumber">License Number</label>
								</div>
						  	</div>
		        			
		        		</div>
		        	</div>

		        	<div class="row">
		        		<div class="col s12">
					  		<div class="input-field col s4">
					          <input id="firstname" name="firstname" type="text" class="validate">
					          <label for="firstname">First Name</label>
							</div>
							<div class="input-field col s4">
					          <input id="middlename" name="middlename" type="text" class="validate">
					          <label for="middlename">Middle Name</label>
							</div>
							<div class="input-field col s4">
					          <input id="lastname" name="lastname" type="text" class="validate">
					          <label for="lastname">Last Name</label>
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
			  		<a class="waves-effect waves-light btn" onclick="sendForm('add_teacher_form','/api/teacher/new','teacher')">Submit</a>
			  	</div>
		        </div>
		      </div>
		    </div>
		  </div>
	</form>
@endif