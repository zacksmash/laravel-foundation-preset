@extends('layouts.auth')

@section('content')
  <form role="form" method="POST" action="{{ url('/password/reset') }}" data-abide novalidate>
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
      <label for="email" {{ $errors->has('email') ? 'class=is-invalid-label' : '' }}>E-Mail Address</label>
      <input id="email" type="email" {{ $errors->has('email') ? 'class=is-invalid-input' : '' }} name="email" value="{{ $email or old('email') }}" required autofocus>

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
      <label for="password-confirm" {{ $errors->has('password_confirmation') ? 'class=is-invalid-label' : '' }}>Confirm Password</label>
      <input id="password-confirm" type="password" {{ $errors->has('password_confirmation') ? 'class=is-invalid-input' : '' }} name="password_confirmation" required>

      @if ($errors->has('password_confirmation'))
        <span class="form-error is-visible">{{ $errors->first('password_confirmation') }}</span>
      @endif
    </div>

    <div class="form-group">
      <button type="submit" class="button">Reset Password</button>
    </div>
  </form>
@endsection
