@extends('backend.layouts.app')
@section('content')
<main class="h-full pb-16 overflow-y-auto mt-16">
          <div class="container px-6 mx-auto grid">
                <div class="flex justify-items-end">
                     <a class="float-right p-2 mb-8 text-sm  text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"href="{{ route('course.index') }}">Back &LeftArrow;</a>
                </div>
                <h4  class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Course Details</h4>
                <div class="  mb-8 ">
                    <div class="w-full px-4 py-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">Course Info</h4>
                        <div class="flex flex-row">
                            <div class="">
                                        <h3 class="text-lg text-purple-600">Image</h3>
                                        <div class="bg-white border-purple-600 text-center rounded-md ">
                                            @if(!$course->image == '')
                                                <img src="{{asset('images/' . $course->image)}}" alt="" style="width:200px;height:100px;padding:5px;object-fit:contain;" class=" mb-4">
                                            @else
                                                <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="width:200px;height:100px;padding:5px;object-fit:contain;" class="mb-4">
                                            @endif
                                        </div>
                            </div>
                            <div class="text-lg text-purple-600" style="padding-left:40px;">
                                         <h3>Cover Photo</h3>
                                        <div class="bg-white border-purple-600 text-center rounded-md">
                                            @if(!$course->cover_photo == '')
                                                <img src="{{asset('images/' . $course->cover_photo)}}" alt="" style="width:200px;height:100px;padding:5px;object-fit:contain;" class=" mb-4">
                                            @else
                                                <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="width:200px;height:100px;padding:5px;object-fit:contain;" class="mb-4">
                                            @endif
                                        </div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                              <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">Title</p>
                              <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 "> -{{ $course->title }}
                        </div>
                        <div class="flex flex-row mt-4">
                              <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">Instructor Name</p>
                              <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">-{{ $course->Instructor->name }} 
                        </div>
                        <div class="flex flex-row mt-4">
                          <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">Description</p>
                          <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">-{{ $course->description }} 
                        </div>
                        <div class="flex flex-row mt-4">
                            <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">Summary</p>
                            <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">-{!! $course->summary !!} 
                        </div>
                        <div class="flex flex-row mt-4">
                            <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">Joined Date</p>
                            <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">-{{ $course->created_at }} 
                        </div>
                    </div>
                </div>
          </div>
</main>
@endsection



