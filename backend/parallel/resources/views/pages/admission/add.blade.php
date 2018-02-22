@extends('layouts.app')

@section('content')
<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>
<form id="admission_form">
	<div class="row s12">
	    <div class="col s12">
	      <div class="card ">
	        <div class="card-content">
	        	<div style="display:none" id="admission_school_id">{{$school->id}}</div>
	          <span class="card-title">{{$school->name}}</span>
	          <p>{{$school->title1}}</p>
	          <p>{{$school->title2}}</p>

	          <div class="card">
	          	<div class="card-content">
	          		<div class="row">
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
	          			<div class="col s6">
					  		<div class="input-field col ">
					          <input id="admission_student_id" name="student_id" type="text" class="validate">
					          <label for="admission_student_id">Student ID</label>
							</div>
					  	</div>
					  	<div class="col s6">
					  		<div class="input-field col ">
					          <input id="admission_date" name="admission_date" type="text" class="datepicker">
					          <label for="admission_date">Date</label>
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
	          			<div class="col s4">
					         <div class="input-field col">
							    <select id="admission_gender" name="gender">
							      		<option value="" disabled selected>gender</option>
							      		<option value="male">male</option>
							      		<option value="female">female</option>
							    </select>
							    <label>Gender</label>
							</div>
	          			</div>
	          			<div class="col s4">
	          				<div class="input-field col ">
					          <input id="admission_birthdate" name="birthdate" type="text" class="datepicker birthdate">
					          <label for="admission_birthdate">Birthdate</label>
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
	          			<div class="col s6">
	          				<div class="input-field col s12">
					          <input id="admission_guardianname" name="guardian_name" type="text" class="validate">
					          <label for="admission_guardianname">Guardian Name</label>
							</div>
	          			</div>
	          			<div class="col s6">
	          				<div class="input-field col s12">
					          <input id="admission_emergencycontactnumber" name="emergencycontactnumber" type="number" class="validate">
					          <label for="admission_emergencycontactnumber">Emergency Contact</label>
							</div>
	          			</div>
	          		</div>
	          		<div class="row">
	          			<div class="col s12">
					          <div class="input-field col s12">
					            <textarea id="admission_address" class="materialize-textarea" data-length="120"></textarea>
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
					            <textarea id="admission_notes" class="materialize-textarea" data-length="120"></textarea>
					            <label for="admission_notes">Notes</label>
					          </div>
	          			</div>
	          		</div>
	          		<div class="row">
	          			<div class="col s12">
					          <div class="input-field col s12">
					            <textarea id="admission_description" class="materialize-textarea" data-length="120"></textarea>
					            <label for="admission_description">Description</label>
					          </div>
	          			</div>
	          		</div>
	          	</div>
	          </div>


	        </div>
	        <div class="card-action">
	          <div class="row">
		  		<a class="waves-effect waves-light btn" onclick="sendForm('admission_form','/api/admission/new')">Submit</a>
		  	</div>
	        </div>
	      </div>
	    </div>
	  </div>
</form>
@endsection

@section('content-title')
			<h5 class="center">Admission Form</h5>
@endsection