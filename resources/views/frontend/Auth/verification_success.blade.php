@extends('frontend.layouts.app')

@section('content')

        

<div class="card text-center mt-20">
  
  <div class="card-body">
    <h5 class="card-title">Successfully verified!</h5>
    <p class="card-text">Your have been  verified email successfully.Please login    to see your content.</p>
    <a href="{{route('get.login')}}" class="btn btn-primary">Sign In</a>
  </div>
  
</div>


@endsection

