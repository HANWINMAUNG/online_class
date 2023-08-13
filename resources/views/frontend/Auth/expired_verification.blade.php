@extends('frontend.layouts.app')

@section('content')
<div class="card text-center mt-20">
  
  <div class="card-body">
    <h5 class="card-title">Expired Verification</h5>
    <p class="card-text">Your verification lind was expired .Please send new verification link by clicking on the resend button at below.</p>
    <a href="{{route('verification.resend')}}" class="btn btn-primary"> Resend Verification </a>
  </div>
 
</div>    
        


@endsection