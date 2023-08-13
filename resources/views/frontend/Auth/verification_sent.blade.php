@extends('frontend.layouts.app')

@section('content')

<div class="card text-center mt-20">
  
  <div class="card-body">
    <h5 class="card-title">Successfully sent!</h5>
    <p class="card-text"> Your verification link successfully sent.Please check your email and click to verify.</p>
    <a href="{{route('get.login')}}" class="btn btn-primary">Sign In</a>
  </div>
 
</div>      



@endsection

