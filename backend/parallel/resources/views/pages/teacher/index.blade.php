@section('pagescript')
	<script src="/js/pages/teacher/script.js"></script>
@endsection

@extends('layouts.app')

@section('sub-bar')
	@include('pages.teacher.tabs')
@endsection

@section('content')
<div class="col s12">
	<div id="app-main">
	</div>
</div>
@endsection


