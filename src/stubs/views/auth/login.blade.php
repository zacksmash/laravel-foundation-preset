@extends('layouts.auth')

@section('content')
  <form role="form" method="POST" action="{{ url('/login') }}" data-abide novalidate>
    @csrf

    <div class="form-group">
      <label for="email" {{ $errors->has('email') ? 'class=is-invalid-label' : '' }}>E-Mail Address</label>

      <input id="email" type="email" {{ $errors->has('email') ? 'class=is-invalid-input' : '' }} name="email" value="{{ old('email') }}" required autofocus>

      @if ($errors->has('email'))
        <span class="form-error is-visible">{{ $errors->first('email') }}</span>
      @endif
    </div>

    <div class="form-group">
      <label for="password" {{ $errors->has('password') ? 'class=is-invalid-label' : '' }}>Password</label>

      <input id="password" type="password" name="password" {{ $errors->has('password') ? 'class=is-invalid-input' : '' }} required>

      @if ($errors->has('password'))
        <span class="form-error is-visible">{{ $errors->first('password') }}</span>
      @endif
    </div>

    <div>
      <label><input type="checkbox" name="remember"> Remember Me</label>
    </div>

    <button type="submit" class="button">Login</button>
    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
  </form>
@endsection
