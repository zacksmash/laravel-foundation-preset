@extends('layouts.auth')

@section('content')
  <form role="form" method="POST" action="{{ route('login') }}" data-abide novalidate>
    @csrf

    <div class="form-group">
      <label for="email" {{ $errors->has('email') ? 'class=is-invalid-label' : '' }}>E-Mail Address</label>

      <input id="email" type="email" name="email" {{ $errors->has('email') ? 'class=is-invalid-input' : '' }} value="{{ old('email') }}" required autofocus>

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
      <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><label for="remember">Remember Me</label>
    </div>

    <button type="submit" class="button">Login</button>
    <br>
    <small>
      <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
    </small>
  </form>
@endsection
