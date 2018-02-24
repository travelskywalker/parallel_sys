@section('pagescript')
	<script src="/js/pages/section/script.js"></script>
@endsection

@extends('layouts.app')

@section('sub-bar')
	@include('pages.section.tabs')
@endsection

@section('content')
<div class="col s12">
	<div id="app-main">
	</div>
</div>
@endsection


