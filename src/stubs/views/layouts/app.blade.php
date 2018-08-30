@extends('layouts.base')

@section('layout')
	@include('nav.topbar')
	<main class="app" id="app">
		<section class="view">
			@yield('content')
		</section>
	</main>
@endsection
