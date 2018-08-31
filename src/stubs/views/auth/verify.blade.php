@extends('layouts.auth')

@section('content')
  <div class="card">
    <div class="card-divider">
      Verify Your Email Address
    </div>
    <div class="card-section">
      @if (session('resent'))
        <div class="callout success">
          <p>A fresh verification link has been sent to your email address.</p>
        </div>
      @endif
      <p>
        Before proceeding, please check your email for a verification link.
        If you did not receive the email, <a href="{{ route('verification.resend') }}">click here to request another</a>.
      </p>
    </div>
  </div>
@endsection
