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
		      <div class="card hoverable">
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

						<div class="row">
							<div class="input-field col s4">
							    <select id="admission_type" name="type">
							    	<option value="old">old student</option>
							    	<option value="new" selected="">new student</option>
							    </select>
							    <label>Admission Type</label>
							</div>
							<div class="col s8 search-student">
		          				<div class="input-field col s8">
						          <input id="search_student" type="text" class="validate">
						          <label for="search_student">Enter student number or name</label>
								</div>

								<div class="col s12 search-student-result">
								</div>
		          			</div>
						</div>
		          	</div>
		          </div>

		          <div class="card admission-form-container">
		          	<div class="card-content admission-form form-details">
		          		@include('pages.admission.new-admission-form')
		          	</div>
		          </div>


		        </div>
		        <div class="card-action admission-form-action">
		          <div class="row">
			  		<a class="waves-effect waves-light btn admission-btn" onclick="admissionFormSubmit('admission_form','/api/admission/new')">Submit</a>
			  	</div>
		        </div>
		      </div>
		    </div>
		  </div>
	</form>
@endif