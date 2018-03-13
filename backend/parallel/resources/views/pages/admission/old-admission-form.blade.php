
<div class="row">
	<div class="col s4">
		<div class="add-image-container" id="image_container" activates="image_upload" style="background: url('/{{$student->image}}')" >please upload square photo to ensure image compatibility</div>
	</div>
	<div class="col s6">
		<div class="input-field col ">
      <input id="admission_date" name="admission_date" type="text" class="datepicker">
      <label for="admission_date">Date</label>
	</div>
	</div>
	<div class="col s6">
		<div class="input-field col ">
      <input id="admission_student_id" type="number" class="validate" value="{{$student->studentnumber}}" disabled>
      <label for="admission_student_id">Student Number</label>
      <input type="hidden" name="student_id" value="{{$student->id}}">
	</div>
	</div>
</div>
<div class="row">
	<div class="col s4">
		<div class="input-field col s12">
      <input id="admission_first_name" name="first_name" type="text" class="validate" value="{{$student->firstname}}" disabled>
      <label for="admission_first_name">First Name</label>
	</div>
	</div>
	<div class="col s4">
		<div class="input-field col s12">
      <input id="admission_middle_name" name="middle_name" type="text" class="validate" value="{{$student->middlename}}" disabled>
      <label for="admission_middle_name">Middle Name</label>
	</div>
	</div>
	<div class="col s4">
		<div class="input-field col s12">
      <input id="admission_last_name" name="last_name" type="text" class="validate" value="{{$student->lastname}}" disabled>
      <label for="admission_last_name">Last Name</label>
	</div>
	</div>
</div>
<div class="row">
	<div class="col s3">
     <div class="input-field col">
	    <select id="admission_gender" name="gender" disabled>
	      		<option value="male">{{$student->gender}}</option>
	    </select>
	    <label>Gender</label>
	</div>
	</div>
	<div class="col s3">
		<div class="input-field col ">
      <input id="admission_birthdate" name="birthdate" type="text" class="datepicker birthdate" value="{{$student->birthdate}}" disabled>
      <label for="admission_birthdate">Birthdate</label>
	</div>
	</div>
	<div class="col s3">
		<div class="input-field col ">
      <input id="admission_birthplace" name="birthplace" type="text" class="validate birthdate" value="{{$student->birthplace}}" disabled>
      <label for="admission_birthplace">Birth place</label>
	</div>
	</div>
	<div class="col s3">
		<div class="input-field col ">
         <select id="admission_bloodtype" name="bloodtype" disabled>
	      		<option value="" disabled selected>{{$student->bloodtype}}</option>
	    </select>
	    <label>Blood Type</label>
	</div>
	</div>
</div>
<div class="row">
	<div class="col s6">
		<div class="input-field col s12">
      <input id="admission_fathersname" name="fathers_name" type="text" class="validate" value="{{$student->fathersname}}" disabled>
      <label for="admission_fathersname">Father's Name</label>
	</div>
	</div>
	<div class="col s6">
		<div class="input-field col s12">
      <input id="admission_mothersname" name="mothers_name" type="text" class="validate" value="{{$student->mothersname}}" disabled>
      <label for="admission_mothersname">Mother's Name</label>
	</div>
	</div>
</div>
<div class="row">
	<div class="col s4">
		<div class="input-field col s12">
      <input id="admission_guardianname" name="guardian_name" type="text" class="validate" value="{{$student->guardianname}}" disabled>
      <label for="admission_guardianname">Guardian Name</label>
	</div>
	</div>
	<div class="col s4">
		<div class="input-field col s12">
      <input id="admission_emergencycontactnumber" name="emergencycontactnumber" type="number" class="validate" value="{{$student->emergencycontactnumber}}" disabled>
      <label for="admission_emergencycontactnumber">Emergency Contact</label>
	</div>
	</div>
	<div class="col s4">
		<div class="input-field col">
      <input id="admission_guardianrelationship" name="guardianrelationship" type="text" class="validate" value="{{$student->guardianrelationship}}" disabled>
      <label for="admission_guardianrelationship">Guardian Relationship</label>
	</div>
	</div>
</div>
<div class="row">
	<div class="col s12">
      <div class="input-field col s12">
        <textarea id="admission_address" name="address" class="materialize-textarea" disabled>{{$student->address}}</textarea>
        <label for="admission_address">Address</label>
      </div>
	</div>
</div>
<div class="row">
	<div class="col s6">
		<div class="input-field col s12">
      <input id="admission_nationality" name="nationality" type="text" class="validate" value="{{$student->nationality}}" disabled>
      <label for="admission_nationality">Nationality</label>
	</div>
	</div>
	<div class="col s6">
		<div class="input-field col s12">
      <input id="admission_religion" name="religion" type="text" class="validate" value="{{$student->religion}}" disabled>
      <label for="admission_religion">Religion</label>
	</div>
	</div>
</div>
<div class="row">
	<div class="col s12">
      <div class="input-field col s12">
        <textarea id="admission_notes" name="notes" class="materialize-textarea" ></textarea>
        <label for="admission_notes">Notes</label>
      </div>
	</div>
</div>
<div class="row">
	<div class="col s12">
      <div class="input-field col s12">
        <textarea id="admission_description" name="description" class="materialize-textarea"></textarea>
        <label for="admission_description">Description</label>
      </div>
	</div>
</div>