@section('pagescript')
	<script src="/js/pages/student/script.js"></script>
@endsection

@extends('layouts.app')

@section('sub-bar')
	@include('pages.student.tabs')
@endsection

@section('content')
<div class="col s12">
	<div id="app-main">
	</div>
</div>
@endsection


