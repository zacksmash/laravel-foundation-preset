@extends('layouts.auth')

@section('content')
  <form role="form" method="POST" action="{{ route('password.update') }}" data-abide novalidate>
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
      <label for="email" {{ $errors->has('email') ? 'class=is-invalid-label' : '' }}>E-Mail Address</label>
      <input id="email" type="email" name="email" value="{{ $email or old('email') }}" {{ $errors->has('email') ? 'class=is-invalid-input' : '' }} required autofocus>

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

    <div class="form-group">
      <label for="password-confirm" {{ $errors->has('password_confirmation') ? 'class=is-invalid-label' : '' }}>Confirm Password</label>
      <input id="password-confirm" type="password" name="password_confirmation" {{ $errors->has('password_confirmation') ? 'class=is-invalid-input' : '' }} required>

      @if ($errors->has('password_confirmation'))
        <span class="form-error is-visible">{{ $errors->first('password_confirmation') }}</span>
      @endif
    </div>

    <div class="form-group">
      <button type="submit" class="button">Reset Password</button>
    </div>
  </form>
@endsection
