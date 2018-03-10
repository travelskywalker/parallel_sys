@if($fullpage)
	@include('pages.school.index')
@else
<h5 class="left">Add School</h5>
<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>


<form id="add_logo_form" style="display: none">
<input id="image_upload" container="logo_container" form-input="logo" name="image" fdata="add_logo_form" api="/temp/imageupload" type="file" accept="image/*">
</form>


	<form id="add_school_form">
		<div class="row s12">
		    <div class="col s12">
		      <div class="card hoverable">
		        <div class="card-content">
		        	<div class="add-image-container" id="logo_container" activates="image_upload">please upload square photo to ensure image compatibility</div>
					<input type="hidden" name="logo" id="logo">
		        	<div class="row">
	          			<div class="col s12">
					  		<div class="input-field col s12">
					          <input id="school_name" name="name" type="text" class="validate">
					          <label for="school_name">School Name</label>
							</div>
					  	</div>
					</div>
					<div class="row">
	          			<div class="col s12">
					  		<div class="input-field col s12">
					          <input id="title1" name="title1" type="text" class="validate">
					          <label for="title1">Title1</label>
							</div>
					  	</div>
					</div>
					<div class="row">
	          			<div class="col s12">
					  		<div class="input-field col s12">
					          <input id="title2" name="title2" type="text" class="validate">
					          <label for="title2">Title2</label>
							</div>
					  	</div>
					</div>
					<div class="row">
	          			<div class="col s6">
					  		<div class="input-field col s12">
					          <input id="admin" name="admin" type="text" class="validate">
					          <label for="admin" data-error="please enter valid email address">Admin Name</label>
							</div>
					  	</div>
					  	<div class="col s6">
					  		<div class="input-field col s12">
					          <input id="email" name="email" type="email" class="validate">
					          <label for="email">Email</label>
							</div>
					  	</div>
					</div>
					<div class="row">
	          			<div class="col s6">
					  		<div class="input-field col s12">
					          <input id="phonenumber" name="phonenumber" type="number" class="validate">
					          <label for="phonenumber">Phone</label>
							</div>
					  	</div>
					  	<div class="col s6">
					  		<div class="input-field col s12">
					          <input id="mobilenumber" name="mobilenumber" type="number" class="validate">
					          <label for="mobilenumber">Mobile</label>
							</div>
					  	</div>
					</div>
					<div class="row">
	          			<div class="col s12">
					          <div class="input-field col s12">
					            <textarea id="address" name="address" class="materialize-textarea" data-length="120"></textarea>
					            <label for="address">Address</label>
					          </div>
	          			</div>
	          		</div>
	          		<div class="row">
	          			<div class="col s6">
					  		<div class="input-field col s12">
					          <input id="city" name="city" type="text" class="validate">
					          <label for="city">City</label>
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
			  		<a class="waves-effect waves-light btn" onclick="sendForm('add_school_form','/api/school/new','school')">Submit</a>
			  	</div>
		        </div>
		      </div>
		    </div>
		  </div>
	</form>
@endif