@section('pagescript')
	<script src="/js/pages/user/script.js"></script>
@endsection

@extends('layouts.app')

@section('sub-bar')
	@include('pages.admin.tabs')
@endsection

@section('content')
<div id="app-main"></div>
@endsection


