@if($fullpage)
	@include('pages.admission.index')
@else
	<div class="row error-container">
		<div class="col s12 error-message"></div>
		<div class="col s12 error-data"></div>
	</div>
	<form id="admission_form">
		<div class="row s12">
		    <div class="col s12">
		      <div class="card ">
		        <div class="card-content">

		          <div class="card">
		          	<div class="card-content">
		          		<div class="row">
		          			<div class="input-field col s12">
							    <select id="admission_school_id" name="school_id" disabled>
								      <option value="{{$admission[0]->school_id}}">{{$admission[0]->school_name}}</option>
							    </select>
							    <label>School</label>
							</div>
					  		<div class="input-field col s4">
							    <select id="admission_class_id" name="classes_id">
						      		@foreach($classes as $class)
						      			<option value="{{$class->id}}" @if($admission[0]->section_id == $class->id) selected @endif>{{$class->name}}</option>
						      		@endforeach
							    </select>
							    <label>Class</label>
							</div>
							<div class="input-field col s4">
							    <select id="admission_section_id" name="section_id">
							    	@foreach($sections as $section)
							    		<option value="{{$section->id}}" @if($admission[0]->section_id == $section->id) selected @endif>{{$section->name}}</option>
							    	@endforeach
							    </select>
							    <label>Section</label>
							</div>
							<div class="input-field col s4">
						          <input id="admission_number" name="admission_id" type="number" class="validate" value="{{$admission[0]->admissionnumber}}">
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
		          			<div class="row s12">
			          			<div class="col s4">
			          				<div class="add-image-container" id="image_container" activates="image_upload" style="background:url('/{{$admission[0]->image}}')"></div>
			          			</div>
			          			<div class="col s6">
			          				<div class="input-field col ">
							          <input id="admission_date" name="admission_date" type="text" class="datepicker" value="{{$admission[0]->date}}">
							          <label for="admission_date">Date</label>
									</div>
			          			</div>
			          			<div class="col s6">
							  		<div class="input-field col ">
							          <input id="admission_student_id" name="student_id" type="text" class="validate" value="{{$admission[0]->studentnumber}}">
							          <label for="admission_student_id">Student Number</label>
									</div>
							  	</div>
							  </div>
		          		</div>
		          		<div class="row">
		          			<div class="col s4">
		          				<div class="input-field col ">
						          <input id="admission_first_name" name="first_name" type="text" class="validate" value="{{$admission[0]->firstname}}">
						          <label for="admission_first_name">First Name</label>
								</div>
		          			</div>
		          			<div class="col s4">
		          				<div class="input-field col ">
						          <input id="admission_middle_name" name="middle_name" type="text" class="validate" value="{{$admission[0]->middlename}}">
						          <label for="admission_middle_name">Middle Name</label>
								</div>
		          			</div>
		          			<div class="col s4">
		          				<div class="input-field col ">
						          <input id="admission_last_name" name="last_name" type="text" class="validate" value="{{$admission[0]->lastname}}">
						          <label for="admission_last_name">Last Name</label>
								</div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s4">
						         <div class="input-field col">
								    <select id="admission_gender" name="gender">
								      		<option value="male" @if($admission[0]->gender == 'male') selected @endif>male</option>
								      		<option value="female" @if($admission[0]->gender == 'female') selected @endif>female</option>
								    </select>
								    <label>Gender</label>
								</div>
		          			</div>
		          			<div class="col s4">
		          				<div class="input-field col ">
						          <input id="admission_birthdate" name="birthdate" type="text" class="datepicker birthdate" value="{{$admission[0]->birthdate}}">
						          <label for="admission_birthdate">Birthdate</label>
								</div>
		          			</div>
		          			<div class="col s4">
		          				<div class="input-field col ">
						          <input id="admission_birthplace" name="birthplace" type="text" class="validate birthplace" value="{{$admission[0]->birthplace}}">
						          <label for="admission_birthplace">Birth place</label>
								</div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s6">
		          				<div class="input-field col s12">
						          <input id="admission_fathersname" name="fathers_name" type="text" class="validate" value="{{$admission[0]->fathersname}}">
						          <label for="admission_fathersname">Father's Name</label>
								</div>
		          			</div>
		          			<div class="col s6">
		          				<div class="input-field col s12">
						          <input id="admission_mothersname" name="mothers_name" type="text" class="validate" value="{{$admission[0]->mothersname}}">
						          <label for="admission_mothersname">Mother's Name</label>
								</div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s4">
		          				<div class="input-field col s12">
						          <input id="admission_guardianname" name="guardian_name" type="text" class="validate" value="{{$admission[0]->guardianname}}">
						          <label for="admission_guardianname">Guardian Name</label>
								</div>
		          			</div>
		          			<div class="col s4">
		          				<div class="input-field col s12">
						          <input id="admission_emergencycontactnumber" name="emergencycontactnumber" type="number" class="validate" value="{{$admission[0]->emergencycontactnumber}}">
						          <label for="admission_emergencycontactnumber">Emergency Contact</label>
								</div>
		          			</div>
		          			<div class="col s4">
		          				<div class="input-field col">
						          <input id="admission_guardianrelationship" name="guardianrelationship" type="text" class="validate" value="{{$admission[0]->guardianrelationship}}">
						          <label for="admission_guardianrelationship">Guardian Relationship</label>
								</div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s12">
						          <div class="input-field col s12">
						            <textarea id="admission_address" name="address" class="materialize-textarea" data-length="120" >{{$admission[0]->address}}</textarea>
						            <label for="admission_address">Address</label>
						          </div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s6">
		          				<div class="input-field col s12">
						          <input id="admission_nationality" name="nationality" type="text" class="validate" value="{{$admission[0]->nationality}}">
						          <label for="admission_nationality">Nationality</label>
								</div>
		          			</div>
		          			<div class="col s6">
		          				<div class="input-field col s12">
						          <input id="admission_religion" name="religion" type="text" class="validate" value="{{$admission[0]->religion}}">
						          <label for="admission_religion">Religion</label>
								</div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s12">
						          <div class="input-field col s12">
						            <textarea id="admission_notes" name="notes" class="materialize-textarea" data-length="120">{{$admission[0]->notes}}</textarea>
						            <label for="admission_notes">Notes</label>
						          </div>
		          			</div>
		          		</div>
		          		<div class="row">
		          			<div class="col s12">
						          <div class="input-field col s12">
						            <textarea id="admission_description" name="description" class="materialize-textarea" data-length="120">{{$admission[0]->description}}</textarea>
						            <label for="admission_description">Description</label>
						          </div>
		          			</div>
		          		</div>
		          	</div>
		          </div>


		        </div>
		        <!-- <div class="card-action">
		          <div class="row">
			  		<a class="waves-effect waves-light btn" onclick="admissionFormSubmit('admission_form','/api/admission/new')">Submit</a>
			  	</div>
		        </div> -->
		      </div>
		    </div>
		  </div>
	</form>

	@include('action-menu.menu',array( 'menus'=> ['print','edit' ]) )
@endif