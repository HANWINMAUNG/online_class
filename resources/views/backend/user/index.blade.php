@extends('backend.layouts.app')

@section('content') 

<main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto flex ">
            
            
                @include('backend.layouts.page_info')
            <!-- CTA -->
            <div class="justify-items-end my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              <a
                class="float-right p-4 mb-8 text-sm  text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                href="{{route('user.create')}}"
              >
                User Create&RightArrow;
              </a>
            </div>
            <!-- With actions -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
             User Table
            </h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <div class="p-4">
                <table class="display p-4" id="myTable">
                  <thead>
                    <tr>
                      <th class="px-4 py-3">User Name</th>
                      <th class="px-4 py-3">Email</th>
                      <th class="px-4 py-3">Phone</th>
                      <th class="px-4 py-3">Date Of Birth</th>
                      <th class="px-4 py-3">Gender</th>
                      <th class="px-4 py-3">Address</th>
                      <th class="px-4 py-3">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="p-2">
                  @foreach($users as $user )
                    <tr >
                      <td >
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold">{{ $user['name']}}</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                              10x Developer
                            </p>
                          </div>
                        </div>
                      </td>
                      <td >
                      {{ $user['email']}}
                      </td>
                      <td >
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                        {{ $user['phone']}}
                        </span>
                      </td>
                      <td >
                      {{ $user['dob']}}
                      </td>
                      <td >
                      {{ $user['gender']}}
                      </td>
                      <td >
                      {{ $user['address']}}
                      </td>
                      <td >
                        <div class="flex items-center space-x-4 text-sm">
                          <a href="{{ route('user.edit' ,$user->id )}}">
                          <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit"
                          >
                            <svg
                              class="w-5 h-5"
                              aria-hidden="true"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                            >
                              <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                              ></path>
                            </svg>
                          </button>
                          </a>

                          <form action="{{ route('user.destroy',$user->id)}}" method="POST" class="d-inline-block">
                                  @csrf
                                   @method('DELETE')
                              <button
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Delete"
                              >
                                <svg
                                  class="w-5 h-5"
                                  aria-hidden="true"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                              </button>
                          </form
                          </a>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                    
                  </tbody>
                </table>
                </div>
             
            </div>
        </div>
    </div>
</main>

@endsection