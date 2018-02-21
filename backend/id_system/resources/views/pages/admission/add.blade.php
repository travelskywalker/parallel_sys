@extends('layouts.app')

@section('content')
<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>
<form id="add_admission_form">
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
						    <select id="admission_class_id" name="class_id">
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
					  	<div class="row">

					  	</div>
					</div>
	          	</div>
	          </div>

	          <div class="card">
	          	<div class="card-content">
	          		
	          	</div>
	          </div>


	        </div>
	        <div class="card-action">
	          <a href="#">Submit</a>
	        </div>
	      </div>
	    </div>
	  </div>
</form>
@endsection

@section('content-title')
			<h5 class="center">New Admission</h5>
@endsection