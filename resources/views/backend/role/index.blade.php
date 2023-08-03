@extends('backend.layouts.app')

@section('content') 

<main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto flex ">
            
            
                @include('backend.layouts.page_info')
            <!-- CTA -->
            <div class="justify-items-end my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              <a
                class="float-right p-4 mb-8 text-sm  text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                href="{{route('role.create')}}"
              >
               Role Create &RightArrow;
              </a>
            </div>
            <!-- With actions -->
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
             Role Table
            </h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <div class="p-4">
                <table class="display p-4 data-table">
                  <thead>
                    <tr>
                      <th class="px-4 py-3">Admin Name</th>
                      <th class="px-4 py-3">Actions</th>
                    </tr>
                  </thead>
                  <tbody class="p-2">

                    
                  </tbody>
                </table>
                </div>
             
            </div>
        </div>
    </div>
</main>

@endsection
@push('script')
              <script type="text/javascript">

              $(function () {

                var table = $('.data-table').DataTable({

                    processing: true,

                    serverSide: true,

                    ajax: "{{ route('role.index') }}",

                    columns: [

                        {data: 'name', name: 'name',class:'text-center'},

                        {data: 'action', name: 'action',class:'text-center'},

                    ]

                });     
              });

              </script>





@endpush