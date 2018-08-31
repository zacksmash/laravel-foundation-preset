@extends('layouts.auth')

@section('content')
  @if (session('status'))
    <div class="callout success">
      <p>{{ session('status') }}</p>
    </div>
  @endif

  <form role="form" method="POST" action="{{ route('password.email') }}" data-abide novalidate>
    @csrf

    <div class="form-group">
      <label for="email" {{ $errors->has('email') ? 'class=is-invalid-label' : '' }}>E-Mail Address</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" {{ $errors->has('email') ? 'class=is-invalid-input' : '' }} required>

      @if ($errors->has('email'))
        <span class="form-error is-visible">{{ $errors->first('email') }}</span>
      @endif
    </div>

    <div class="form-group">
      <button type="submit" class="button">Send Password Reset Link</button>
    </div>
  </form>
@endsection
