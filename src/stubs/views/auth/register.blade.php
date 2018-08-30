@extends('layouts.auth')

@section('content')
  <form role="form" method="POST" action="{{ url('/register') }}" data-abide novalidate>
    @csrf

    <div class="form-group">
      <label for="name" {{ $errors->has('name') ? 'class=is-invalid-label' : '' }}>Name</label>
      <input id="name" type="text" {{ $errors->has('name') ? 'class=is-invalid-input' : '' }} name="name" value="{{ old('name') }}" required autofocus>

      @if ($errors->has('name'))
        <span class="form-error is-visible">{{ $errors->first('name') }}</span>
      @endif
    </div>

    <div class="form-group">
      <label for="email" {{ $errors->has('email') ? 'class=is-invalid-label' : '' }}>E-Mail Address</label>
      <input id="email" type="email" {{ $errors->has('email') ? 'class=is-invalid-input' : '' }} name="email" value="{{ old('email') }}" required>

      @if ($errors->has('email'))
        <span class="form-error is-visible">{{ $errors->first('email') }}</span>
      @endif
    </div>

    <div class="form-group">
      <label for="password" {{ $errors->has('password') ? 'class=is-invalid-label' : '' }}>Password</label>
      <input id="password" type="password" {{ $errors->has('password') ? 'class=is-invalid-input' : '' }} name="password" required>

      @if ($errors->has('password'))
        <span class="form-error is-visible">{{ $errors->first('password') }}</span>
      @endif
    </div>

    <div class="form-group">
      <label for="password-confirm">Confirm Password</label>
      <input id="password-confirm" type="password" name="password_confirmation" required>
    </div>

    <div>
      <button type="submit" class="button">Register</button>
    </div>
  </form>
@endsection
