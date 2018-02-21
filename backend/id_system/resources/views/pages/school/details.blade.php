@extends('layouts.app')

@section('content')
	<div class="card">
	    <div class="card-image waves-effect waves-block waves-light">
	      <img class="activator" src="{{$school->logo}}">
	    </div>
	    <div class="card-content">
	      <span class="card-title activator grey-text text-darken-4">{{$school->name}}<i class="material-icons right">more_vert</i></span>
	      @if($school->title1) <p>{{$school->title1}}</p> @endif
	      @if($school->title2) <p>{{$school->title2}}</p> @endif

	      <p></p>

	      <p><b>School Administrator:</b> {{$school->admin}}</p>
	      <p><b>Address:</b> {{$school->address}}</p>
	      <p><b>Phone Number:</b> {{$school->phonenumber}}</p>
	      <p><b>Mobile Number:</b> {{$school->mobilenumber}}</p>
	      <p><b>Email:</b> {{$school->email}}</p>
	      <p><b>Status:</b> {{$school->status}}</p>

	      
	    </div>

	    <div class="card-reveal">
	      <span class="card-title grey-text text-darken-4">{{$school->name}}<i class="material-icons right">close</i></span>
	      

	      <div class="row">
	        <div class="col s12">
	          <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	            	<span class="card-title">Available Classes</span>

	            	@if(count($classes) <=0)
						no class available for this school
					@else
		            	<table class="bordered">
							<tbody>

								@foreach ($classes as $class)
								<tr class="data-row" onclick="showDetails('class',{{$class->id}})">
							    <td>{{$class->name}}</td>
							  </tr>
								@endforeach
							</tbody>
						</table>

						<a href="/school/classes/{{$school->id}}">see all</a>
					@endif
	            </div>
	            
	          </div>
	        </div>
	      </div>

	      <div class="row">
	        <div class="col s12">
	          <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	            	<span class="card-title">List of Teachers</span>

	            	@if(count($teachers) <=0)
						no listed teachers in this school
					@else
		            	<table class="bordered">
							<tbody>
								@foreach ($teachers as $teacher)

								<tr class="data-row" onclick="showDetails('teacher', {{$teacher->id}})">
								<?php $name = $teacher->firstname." ".$teacher->lastname; ?>
							    
							    <td><img src="{{$teacher->image}}" width="40" height="40"> {{$name}}</td>
							  </tr>
								@endforeach
							</tbody>
						</table>

						<a href="/teachers/school/id">see all</a>
					@endif
	            </div>
	            
	          </div>
	        </div>
	      </div>
	      
	      	

	    </div>
	  </div>
@endsection