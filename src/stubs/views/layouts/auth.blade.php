@extends('layouts.base')

@section('layout')
	@include('nav.topbar')
  <main class="auth">
    <div class="row align-center">
      <div class="large-5 medium-8 small-12 columns">
        @yield('content')
      </div>
    </div>
  </main>
@endsection
