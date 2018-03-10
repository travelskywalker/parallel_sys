@section('pagescript')
	<script src="/js/pages/admin/script.js"></script>
	<script src="/js/widget/clock.js"></script>
	<script src="/js/widget/search.js"></script>
	<script src="/js/widget/contact.js"></script>
@endsection

@extends('layouts.app')

@section('sub-bar')
	@include('pages.admin.tabs')
@endsection

@section('sidenav')
	@include('pages.admin.sidenav')
@endsection

@section('content')
	<div id="app-main"></div>
@endsection


