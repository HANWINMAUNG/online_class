@extends('backend.layouts.app')
@section('content')
<main class="h-full pb-16 overflow-y-auto mt-16">
          <div class="container px-6 mx-auto grid">
              <div class="flex justify-items-end">
                  <a class="float-right p-2 mb-8 text-sm  text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"href="{{route('user.index')}}">Back &LeftArrow;</a>
              </div>
              <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">User Details</h4>
              <div class="  mb-8 ">
                      <div class="w-full px-4 py-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">Personal Info</h4>
                                <div class="bg-white border-purple-600 text-center rounded-md border-purple-600">
                                          @if(!$user->profile == '')
                                                <img src="{{asset('images/' . $user->profile)}}" alt="" style="width:200px;height:200px;padding-top:10px;object-fit:contain;" class=" mb-4 pt-6">
                                          @else
                                                <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="width:200px;height:200px;padding-top:10px;object-fit:contain;" class="mb-4 pt-6">
                                          @endif
                                </div>
                                <div class="flex flex-row">
                                    <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">Name</p>
                                    <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">-{{ $user->name }}
                                </div>
                                <div class="flex flex-row mt-4">
                                      <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">Email</p>
                                      <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">-{{$user->email}}</p> 
                                </div>
                                <div class="flex flex-row mt-4">
                                        <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">Gender</p>
                                        <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">-{{ $user->gender }}</p>
                                </div>
                                <div class="flex flex-row mt-4">
                                      <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">Phone</p>
                                      <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">-{{$user->phone}}</p>
                                </div>
                                <div class="flex flex-row mt-4">
                                      <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">Date of Birth</p>
                                      <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">-{{$user->dob}}</p> 
                                </div>
                                <div class="flex flex-row mt-4">
                                      <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">Joined Date</p>
                                      <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">-{{ $user->created_at }}</p> 
                                </div>
                                <div class="flex flex-row mt-4">
                                      <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">Address</p>
                                      <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">-{{ $user->address }} 
                                </div>
                      </div>
              </div>
          </div>
</main>
@endsection



