@section('pagescript')
	<script src="/js/pages/school/script.js"></script>
@endsection

@extends('layouts.app')

@section('sub-bar')
	@include('pages.school.tabs')
@endsection

@section('content')
<div class="col s12">
	<div id="app-main">
	</div>
</div>
@endsection


