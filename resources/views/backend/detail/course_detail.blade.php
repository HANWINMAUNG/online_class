@extends('backend.layouts.app')

@section('content')
<main class="h-full pb-16 overflow-y-auto mt-16">
          <div class="container px-6 mx-auto grid">
          <div class="flex justify-items-end">
              <a
                class="float-right p-4 mb-8 text-sm  text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                href="{{route('course.index')}}"
              >
                Back &LeftArrow;
              </a>
            </div>
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Course Details
            </h4>
            <div class="  mb-8 ">
              <div
                class="w-full p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  Personal Info
                </h4>
                <div class="flex flex-row">
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Title
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">
                  -{{$course->title}}
              </div>

              <div class="flex flex-row mt-4">
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Instructor Name
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">
                  -{{$course->Instructor->name}} 
              </div>

              <div class="flex flex-row mt-4">
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Description
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">
                  -{{$course->description}} 
              </div>

              <div class="flex flex-row mt-4">
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Summary
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">
                  -{{$course->summary}} 
              </div>

             

              <div class="flex flex-row mt-4">
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Joined Date
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">
                  -{{$course->created_at}} 
              </div>

            </div>
          </div>
        </main>


@endsection



