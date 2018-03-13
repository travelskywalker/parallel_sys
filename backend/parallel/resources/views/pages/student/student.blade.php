@if($fullpage)
	@include('pages.student.index')
@else

<div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Test 1</a></li>
        <li class="tab col s3"><a class="active" href="#test2">Test 2</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">Test 1</div>
    <div id="test2" class="col s12">Test 2</div>

<div class="form-details">
		<div class="row">
				<div class="col s4">
					<div class="image-container materialboxed" style="background:url('/{{$student[0]->image}}')"></div>
				</div>
				<div class="col s8">
			  		<div class="input-field col s8">
			          <input id="student_school" type="text" class="validate" value="{{$student[0]->school_name}}" disabled>
			          <label for="student_school">School</label>
					</div>
					<div class="input-field col s4">
			          <input id="admission_student_id" name="student_id" type="text" class="validate" value="{{$student[0]->studentnumber}}" disabled>
			          <label for="admission_student_id">Student Number</label>
					</div>
			  	</div>
				<div class="col s8">
			  		<div class="input-field col s6">
			          <input id="admission_student_id" name="student_id" type="text" class="validate" value="{{$student[0]->class_name}}" disabled>
			          <label for="admission_student_id">Class</label>
					</div>
					<div class="input-field col s6">
					  <input id="section" type="text" class="validate" value="{{$student[0]->section_name}}" disabled>
			          <label for="section">Section</label>
					</div>
			  	</div>
			  	<div class="col s8">
			  		<div class="input-field col s6">
			          <input id="time" type="text" class="validate" value="{{Carbon\Carbon::parse($student[0]->timefrom)->format('h:i A')}} - {{Carbon\Carbon::parse($student[0]->timeto)->format('h:i A')}}" disabled>
			          <label for="time">Time</label>
					</div>
					<div class="input-field col s6">
					  <input id="room" type="text" class="validate" value="{{$student[0]->room}}" disabled>
			          <label for="room">Room</label>
					</div>
			  	</div>
			<div class="col s4">
				<div class="input-field col s12">
	          <input id="admission_first_name" name="first_name" type="text" class="validate" value="{{$student[0]->firstname}}" disabled>
	          <label for="admission_first_name">First Name</label>
			</div>
			</div>
			<div class="col s4">
				<div class="input-field col s12">
	          <input id="admission_middle_name" name="middle_name" type="text" class="validate" value="{{$student[0]->middlename}}" disabled>
	          <label for="admission_middle_name">Middle Name</label>
			</div>
			</div>
			<div class="col s4">
				<div class="input-field col s12">
	          <input id="admission_last_name" name="last_name" type="text" class="validate" value="{{$student[0]->lastname}}" disabled>
	          <label for="admission_last_name">Last Name</label>
			</div>
			</div>
  			<div class="col s3">
		         <div class="input-field col">
				    <select id="admission_gender" name="gender" disabled>
			      		<option value="male" @if($student[0]->gender == 'male') selected @endif>male</option>
			      		<option value="female" @if($student[0]->gender == 'female') selected @endif>female</option>
			    </select>
			    <label>Gender</label>
				</div>
  			</div>
  			<div class="col s3">
  				<div class="input-field col ">
		          <input id="admission_birthdate" name="birthdate" type="text" class="datepicker birthdate" value="{{$student[0]->birthdate}}" disabled>
		          <label for="admission_birthdate">Birthdate</label>
				</div>
  			</div>
  			<div class="col s3">
  				<div class="input-field col ">
		          <input id="admission_birthplace" name="birthplace" type="text" class="validate birthdate" value="{{$student[0]->birthplace}}" disabled>
		          <label for="admission_birthplace">Birth place</label>
				</div>
  			</div>
  			<div class="col s3">
  				<div class="input-field col ">
			         <select id="admission_bloodtype" name="bloodtype" disabled>
				      		<option value="" @if($student[0]->bloodtype == null) selected @endif >blood type</option>
				      		<option value="O" @if($student[0]->bloodtype == 'O') selected @endif >O</option>
				      		<option value="A" @if($student[0]->bloodtype == 'A') selected @endif>A</option>
				      		<option value="B" @if($student[0]->bloodtype == 'B') selected @endif>B</option>
				      		<option value="AB" @if($student[0]->bloodtype == 'AB') selected @endif>AB</option>
				    </select>
				    <label>Blood Type</label>
				</div>
  			</div>
			<div class="col s6">
				<div class="input-field col s12">
	          <input id="admission_fathersname" name="fathers_name" type="text" class="validate" value="{{$student[0]->fathersname}}" disabled>
	          <label for="admission_fathersname">Father's Name</label>
			</div>
			</div>
			<div class="col s6">
				<div class="input-field col s12">
	          <input id="admission_mothersname" name="mothers_name" type="text" class="validate" value="{{$student[0]->mothersname}}" disabled>
	          <label for="admission_mothersname">Mother's Name</label>
			</div>
			</div>
			<div class="col s4">
				<div class="input-field col s12">
	          <input id="admission_guardianname" name="guardian_name" type="text" class="validate" value="{{$student[0]->guardianname}}" disabled>
	          <label for="admission_guardianname">Guardian Name</label>
			</div>
			</div>
			<div class="col s4">
				<div class="input-field col s12">
	          <input id="admission_emergencycontactnumber" name="emergencycontactnumber" type="number" class="validate" value="{{$student[0]->emergencycontactnumber}}" disabled>
	          <label for="admission_emergencycontactnumber">Emergency Contact</label>
			</div>
			</div>
			<div class="col s4">
				<div class="input-field col s12">
	          <input id="admission_guardianrelationship" name="guardianrelationship" type="text" class="validate" value="{{$student[0]->guardianrelationship}}" disabled>
	          <label for="admission_guardianrelationship">Guardian Relationship</label>
			</div>
			</div>
			<div class="col s12">
	          <div class="input-field col s12">
	            <textarea id="admission_address" name="address" class="materialize-textarea" data-length="120" disabled >{{$student[0]->address}}</textarea>
	            <label for="admission_address">Address</label>
	          </div>
			</div>
			<div class="col s6">
				<div class="input-field col s12">
	          <input id="admission_nationality" name="nationality" type="text" class="validate" value="{{$student[0]->nationality}}" disabled>
	          <label for="admission_nationality">Nationality</label>
			</div>
			</div>
			<div class="col s6">
				<div class="input-field col s12">
	          <input id="admission_religion" name="religion" type="text" class="validate" value="{{$student[0]->religion}}" disabled>
	          <label for="admission_religion">Religion</label>
			</div>
			</div>
			
					<div class="collapsible-header"><i class="material-icons">account_circle</i>Others</div>
			            <div class="collapsible-body">
			            	<div class="col s12">
					          <div class="input-field col s12">
					            <textarea id="admission_notes" name="notes" class="materialize-textarea" data-length="120" disabled>{{$student[0]->notes}}</textarea>
					            <label for="admission_notes">Notes</label>
					          </div>
							</div>

							<div class="col s12">
					          <div class="input-field col s12">
					            <textarea id="admission_description" name="description" class="materialize-textarea" data-length="120" disabled>{{$student[0]->description}}</textarea>
					            <label for="admission_description">Description</label>
					          </div>
							</div>
			            </div>

			

		</div>

	</div>
</div>

@include('action-menu.menu',array( 'menus'=> ['print','edit' ]) )
@endif