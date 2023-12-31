<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{asset('assets/css/tailwind.output.css')}}" />
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

    <script src="{{asset('assets/js/init-alpine.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="{{ asset('assets/js/charts-lines.js')}}"></script>

    <script src="{{ asset('assets/js/charts-pie.js')}}"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    

  </head>
      <body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">
            <img
              aria-hidden="true"
              class="object-cover w-full h-full dark:hidden"
              src="{{asset('assets/img/login-office.jpeg')}}"
              alt="Office"
            />
            <img
              aria-hidden="true"
              class="hidden object-cover w-full h-full dark:block"
              src="{{asset('assets/img/login-office-dark.jpeg')}}"
              alt="Office"
            />
          </div>

          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
              >
                Login
              </h1>
             
                    <form  action="{{route('admin_post.login')}}" method="POST">
                      @csrf
                        <label class="block text-sm">
                          <span class="text-gray-700 dark:text-gray-400">Email<span style="color:red;">*</span></span>
                          <input type="text" name="email"class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                        </label>
                        @error('email')
                        <small style="color:red;">{{$message}}</small>
                        @enderror
                        <label class="block mt-4 text-sm">
                          <span class="text-gray-700 dark:text-gray-400">Password<span style="color:red;">*</span></span>
                          <input type="password" name="password"class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        </label>
                        @error('password')
                        <small style="color:red;">{{$message}}</small>
                        @enderror
                        <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                          Log in
                      </button>

                        <hr class="my-8" />
                        <p class="mt-4">
                          <a
                            class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                            href="{{route('forgot-password.index')}}"
                          >
                            Forgot your password?
                          </a>
                        </p>
                    </form>
              <p class="mt-1">
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
