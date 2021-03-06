<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<!-- CSRF Token -->
  	<meta name="csrf-token" content="{{ csrf_token() }}">
  	<title>{{ config('app.name', 'Laravel') }}</title>
  	<!-- Styles -->
  	<link href="{{ mix('css/app.css') }}" rel="stylesheet">
  </head>

  <body>
    @yield('layout')

  	<!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
  	<script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>
