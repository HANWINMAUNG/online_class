@extends('frontend.layouts.app')

@section('content')

<div class="card text-center mt-20">
  
  <div class="card-body">
    <h5 class="card-title">Verify Your Email</h5>
    <p class="card-text">Please check your email verify and click on the verification link to verify your email address.</p>
    <a href="{{route('verification.resend')}}" class="btn btn-primary">Resend Verification </a>
  </div>
 
</div>   



@endsection

