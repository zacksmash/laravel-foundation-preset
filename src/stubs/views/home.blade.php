@extends('layouts.app')

@section('content')
  @if (session('status'))
    <div class="callout success">
      <p>{{ session('status') }}</p>
    </div>
  @endif

  <div class="row column">
    <div class="card">
      <div class="card-divider">
        Dashboard
      </div>
      <div class="card-section">
        <p>You are logged in!</p>
      </div>
    </div>
  </div>
@endsection
