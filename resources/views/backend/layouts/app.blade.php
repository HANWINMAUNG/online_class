<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{asset('assets/css/tailwind.output.css')}}" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{asset('css/rte_theme_default.css')}}"/>

    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css " rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    @stack('header')
  </head>
  <body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900":class="{ 'overflow-hidden': isSideMenuOpen }">

                @include('backend.layouts.sidebar')
             <div class="flex flex-col flex-1 w-full">
                @include('backend.layouts.header')
                @yield('content')
             </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="{{asset('js/just-validate.production.min.js')}}"></script>

    <script src="{{asset('js/date-picker.js')}}"></script>

    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js "></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

    <script src="{{asset('assets/js/init-alpine.js')}}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <script src="{{ asset('assets/js/charts-lines.js')}}"></script>

    <script src="{{ asset('assets/js/charts-pie.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript" src="{{asset('js/rte.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/all_plugins.js')}}"></script>

    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
                  $("#datePicker").pDatePicker({

                            selected: new Date(),

                        });

                        // setTimeout(() =>{

                        //         $('#error_message').fadeOut(); 

                        //     $('#success_message').fadeOut(); 

                        //     },5000);
    </script>
@stack('script')
</body>
</html>