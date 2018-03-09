<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>
<form id="edit_user_form" sendform-url="/user/update/{{$user->id}}">
	<div class="row">
    	<div class="input-field col s12">
          <input id="name" name="name" type="text" class="validate" value="{{$user->name}}">
          <label for="name">Name</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s8">
          <input id="email" name="email" type="email" class="validate" value="{{$user->email}}">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s4">
          <a class="waves-effect waves-light btn" onclick="resetPassword('{{$user->id}}')">reset password</a>
        </div>
  	</div>
  	<div class="row">
  		<div class="input-field col s12">
		    <select id="access_id" name="access_id">
		      	@foreach($accesses as $access)
		      		<option value={{$access->id}} @if($user->access_id == $access->id) selected @endif >{{$access->name}}</option>
		      	@endforeach
		    </select>
		    <label>Access</label>
		  </div>
  	</div>
  	<div class="row" id="school_id_wrapper" @if($user->school_id == null) style="display: none @endif">
  		<div class="input-field col s12">
		    <select id="school_id" name="school_id" >
		      	@foreach($schools as $school)
		      	<option value="{{$school->id}}" @if($user->school_id == $school->id) selected @endif>{{$school->name}}</option>
		      	@endforeach
		    </select>
		    <label>School</label>
		  </div>
  	</div>
  	<!-- <div class="row">
  		<div class="col s4">
  			<a class="waves-effect waves-light btn" onclick="window.history.back();">Cancel</a>
  			<a class="waves-effect waves-light btn" onclick="updateDetails('/user/update/{{$user->id}}', 'edit_user_form' )">Save</a>
  		</div>
  	</div> -->
</form>
