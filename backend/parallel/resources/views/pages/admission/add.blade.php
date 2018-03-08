@if($fullpage)
	@include('pages.admission.index')
@else
	<h5>New Admission</h5>
	<div class="row error-container">
		<div class="col s12 error-message"></div>
		<div class="col s12 error-data"></div>
	</div>

	<form id="add_image_form" style="display: none">
	<input id="image_upload" container="image_container" form-input="image" name="image" fdata="add_image_form" api="/temp/imageupload" type="file" accept="image/*">
	</form>

	<form id="admission_form">
		<input type="hidden" name="image" id="image">
		<div class="row s12">
		    <div class="col s12">
		      <div class="card ">
		        <div class="card-content">

		          <div class="card">
		          	<div class="card-content">
		          		<div class="row">
		          			<div class="input-field col s12">
							    <select id="admission_school_id" name="school_id">
							      		@if(Auth::user()->access_id == 0)<option value="" disabled selected>Select School</option>@endif
							      	@foreach($schools as $school)
							      		<option value="{{$school->id}}">{{$school->name}}</option>
							      	@endforeach
							    </select>
							    <label>School</label>
							</div>
					  		<div class="input-field col s4">
							    <select id="admission_class_id" name="classes_id">
							      		<option value="" disabled selected>select class</option>
							      		@foreach($classes as $class)
							      		<option value="{{$class->id}}">{{$class->name}}</option>
							      		@endforeach
							    </select>
							    <label>Class</label>
							</div>
							<div class="input-field col s4">
							    <select id="admission_section_id" name="section_id">
							    	<option value="" disabled selected>select section</option>
							    </select>
							    <label>Section</label>
							</div>
							<div class="input-field col s4">
						          <input id="admission_number" name="admission_id" type="number" class="validate">
						          <label for="admission_number">Admission Number</label>
							</div>
					  	</div>
					  	<div class="new-admission-section-details">
						  	<div class="row">
						  		<div class="col s4">
						  			<b>Teacher:</b> <span class="section-teacher">adsfadf</span>
						  		</div>
						  		<div class="col s4">
						  			<b>Time: </b> <span class="section-time">8-5</span>
						  		</div>
						  		<div class="col s4">
						  			<b>Room: </b> <span class="section-room">405</span>
						  		</div>
						  	</div>

						</div>
		          	</div>
		          </div>

		          <div class="card">
		          	<div class="card-content">
		          		<div class="row">
		          			<div class="col s4">
		          				<div class="add-image-container" id="image_container" activates="image_upload">please upload square photo to ensure image compatibility</div>
		          			</div>
		          			<div class="col s6">
		          				<div class="input-field col ">
						          <input id="admission_date" name="admission_date" type="text" class="datepicker">
						          <label for="admission_date">Date</label>
								</div>
		          			</div>
		          			<div class="col s6">
						  		<div class="input-field col ">
						          <input id="admission_student_id" name="student_id" type="number" class="validate">
						          <label for="admission_student_id">Student Number</label>
								</div>
						  	</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s4">
		          				<div class="input-field col ">
						          <input id="admission_first_name" name="first_name" type="text" class="validate">
						          <label for="admission_first_name">First Name</label>
								</div>
		          			</div>
		          			<div class="col s4">
		          				<div class="input-field col ">
						          <input id="admission_middle_name" name="middle_name" type="text" class="validate">
						          <label for="admission_middle_name">Middle Name</label>
								</div>
		          			</div>
		          			<div class="col s4">
		          				<div class="input-field col ">
						          <input id="admission_last_name" name="last_name" type="text" class="validate">
						          <label for="admission_last_name">Last Name</label>
								</div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s3">
						         <div class="input-field col">
								    <select id="admission_gender" name="gender">
								      		<option value="" disabled selected>select gender</option>
								      		<option value="male">Male</option>
								      		<option value="female">Female</option>
								    </select>
								    <label>Gender</label>
								</div>
		          			</div>
		          			<div class="col s3">
		          				<div class="input-field col ">
						          <input id="admission_birthdate" name="birthdate" type="text" class="datepicker birthdate">
						          <label for="admission_birthdate">Birthdate</label>
								</div>
		          			</div>
		          			<div class="col s3">
		          				<div class="input-field col ">
						          <input id="admission_birthplace" name="birthplace" type="text" class="validate birthdate">
						          <label for="admission_birthplace">Birth place</label>
								</div>
		          			</div>
		          			<div class="col s3">
		          				<div class="input-field col ">
							         <select id="admission_bloodtype" name="bloodtype">
								      		<option value="" disabled selected>select blood type</option>
								      		<option value="O">O</option>
								      		<option value="A">A</option>
								      		<option value="B">B</option>
								      		<option value="AB">AB</option>
								    </select>
								    <label>Blood Type</label>
								</div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s6">
		          				<div class="input-field col s12">
						          <input id="admission_fathersname" name="fathers_name" type="text" class="validate">
						          <label for="admission_fathersname">Father's Name</label>
								</div>
		          			</div>
		          			<div class="col s6">
		          				<div class="input-field col s12">
						          <input id="admission_mothersname" name="mothers_name" type="text" class="validate">
						          <label for="admission_mothersname">Mother's Name</label>
								</div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s4">
		          				<div class="input-field col s12">
						          <input id="admission_guardianname" name="guardian_name" type="text" class="validate">
						          <label for="admission_guardianname">Guardian Name</label>
								</div>
		          			</div>
		          			<div class="col s4">
		          				<div class="input-field col s12">
						          <input id="admission_emergencycontactnumber" name="emergencycontactnumber" type="number" class="validate">
						          <label for="admission_emergencycontactnumber">Emergency Contact</label>
								</div>
		          			</div>
		          			<div class="col s4">
		          				<div class="input-field col">
						          <input id="admission_guardianrelationship" name="guardianrelationship" type="text" class="validate">
						          <label for="admission_guardianrelationship">Guardian Relationship</label>
								</div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s12">
						          <div class="input-field col s12">
						            <textarea id="admission_address" name="address" class="materialize-textarea" data-length="120"></textarea>
						            <label for="admission_address">Address</label>
						          </div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s6">
		          				<div class="input-field col s12">
						          <input id="admission_nationality" name="nationality" type="text" class="validate">
						          <label for="admission_nationality">Nationality</label>
								</div>
		          			</div>
		          			<div class="col s6">
		          				<div class="input-field col s12">
						          <input id="admission_religion" name="religion" type="text" class="validate">
						          <label for="admission_religion">Religion</label>
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
		          	</div>
		          </div>


		        </div>
		        <div class="card-action">
		          <div class="row">
			  		<a class="waves-effect waves-light btn" onclick="admissionFormSubmit('admission_form','/api/admission/new')">Submit</a>
			  	</div>
		        </div>
		      </div>
		    </div>
		  </div>
	</form>
@endif