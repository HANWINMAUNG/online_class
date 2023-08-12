@extends('frontend.layouts.app')

@section('content')

        
<div class="max-w-2xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 my-36 text-center mx-auto">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-red-600">Expired Verification</h5>
    </a>
    <p class="mb-3 mt-3 font-normal text-gray-700 dark:text-gray-400">
         Your verification lind was expired .Please send new verification link by clicking on the resend button at below.
   </p>
    <a href="{{route('verification.resend')}}" class="inline-flex mt-2 items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Resend Verification  
        
    </a>
</div>


@endsection