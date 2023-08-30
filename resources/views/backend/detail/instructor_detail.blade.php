@extends('backend.layouts.app')

@section('content')
<main class="h-full pb-16 overflow-y-auto mt-16">
          <div class="container px-6 mx-auto grid">
          <div class="flex justify-items-end">
              <a
                class="float-right p-4 mb-8 text-sm  text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                href="{{route('instructor.index')}}"
              >
                Back &LeftArrow;
              </a>
            </div>
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              Instructor Details
            </h4>
            <div class="  mb-8 ">
              <div
                class="w-full p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  Personal Info
                </h4>
                <img src="{{asset('images/' . $instructor->profile)}}" alt="image" style="width:200px;height:200px;" class="mb-4">
                <div class="flex flex-row">
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Name
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">
                  -{{$instructor->name}}
                  </p>
              </div>

              <div class="flex flex-row mt-4">
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Email
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">
                  -{{$instructor->email}} 
                  </p>
              </div>

              <div class="flex flex-row mt-4">
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Gender
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">
                  -{{$instructor->gender}} 
                  </p>
              </div>

              <div class="flex flex-row mt-4">
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Phone
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">
                  -{{$instructor->phone}} 
                  </p>
              </div>

              <div class="flex flex-row mt-4">
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Date of Birth
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">
                  -{{$instructor->dob}} 
                  </p>
              </div>

              <div class="flex flex-row mt-4">
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Joined Date
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">
                  -{{$instructor->created_at}} 
                  </p>
              </div>

              

              <div class="flex flex-row mt-4">
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Address
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 basis-1/2 ">
                  -{{$instructor->address}}
                  </p>
              </div>

              <div class="flex flex-row mt-4">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  Link
                </h4>
               <br>
                @foreach(json_decode($instructor->link,true) as $link)
                <p class="text-gray-600 dark:text-gray-400 basis-1/2 ml-8">
                  Icon
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400 ">
                  -{{$link['icon']}} 
                  </p>
                  <p class="text-gray-600 dark:text-gray-400 ml-8">
                  Url
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400  ">
                  -{{$link['link']}} 
                  </p>
                  <p class="text-gray-600 dark:text-gray-400 ml-8">
                  Label
                </p>
                <p class="ml-6 text-gray-600 dark:text-gray-400  ">
                  -{{$link['label']}} 
                  </p>
                  <br>
                  @endforeach
              </div>

            </div>
          </div>
        </main>


@endsection



