
<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>
<form id="add_user_form">
	<input type="hidden" name="password" value="parallel123">
	<div class="row">
    	<div class="input-field col s12">
          <input id="name" name="name" type="text" class="validate">
          <label for="name">Name</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
  	</div>
  	<div class="row">
  		<div class="input-field col s12">
		    <select id="access_id" name="access_id">
		      		<option value="" disabled selected>select user access</option>
		      	@foreach($accesses as $access)
		      		<option value={{$access->id}}>{{$access->name}}</option>
		      	@endforeach
		    </select>
		    <label>Access</label>
		  </div>
  	</div>
  	<div class="row" id="school_id_wrapper" @if(Auth::user()->access_id == 0) style="display: none" @endif>
  		<div class="input-field col s12">
		    <select id="school_id" name="school_id" >
		      @if(Auth::user()->access_id == 0)<option value="" disabled selected>select school</option>@endif
		      	@foreach($schools as $school)
		      	<option value="{{$school->id}}">{{$school->name}}</option>
		      	@endforeach
		    </select>
		    <label>School</label>
		  </div>
  	</div>
  	<div class="row">
  		<a class="waves-effect waves-light btn" onclick="sendForm('add_user_form','/api/user/add', 'users')">Add User</a>
  	</div>
</form>
