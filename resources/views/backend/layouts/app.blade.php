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
    
    @stack('header')
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }">

                @include('backend.layouts.sidebar')
             <div class="flex flex-col flex-1 w-full">
                @include('backend.layouts.header')
                @yield('content')
               

                


         </div>
    </div>
    @stack('script')
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
                  let table = new DataTable('#myTable')

                  $("#datePicker").pDatePicker({

                            selected: new Date(),

                        });
    </script>
</body>
</html>