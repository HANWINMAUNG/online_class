@extends('backend.layouts.app')
@section('content') 
<main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto flex ">
            <div class="justify-items-end my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              <a class="float-right px-4 py-2 mb-8 text-sm  text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"href="{{ route('user.create') }}"> User Create &RightArrow;</a>
            </div>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">User Table</h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                  <div class="w-full overflow-x-auto">
                    <div class="p-4">
                          <table class="display p-4 data-table">
                            <thead>
                              <tr>
                                <th style="text-align:center;">User Name</th>
                                <th style="text-align:center;">Email</th>
                                <th style="text-align:center;">Phone</th>
                                <th style="text-align:center;">Date Of Birth</th>
                                <th style="text-align:center;">Gender</th>
                                <th style="text-align:center;">Address</th>
                                <th style="text-align:center;">Joined Date</th>
                                <th style="text-align:center;">Actions</th>
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

                    ajax: "{{ route('user.index') }}",

                    columns: [

                        {data: 'name', name: 'name',class:'text-center'},

                        {data: 'email', name: 'email',class:'text-center'},

                        {data: 'phone', name: 'phone',class:'text-center'},

                        {data: 'dob', name: 'dob',class:'text-center'},

                        {data: 'gender', name: 'gender',class:'text-center'},

                        {data: 'address', name: 'address',class:'text-center'},

                        {data: 'created_at', name: 'created_at',class:'text-center'},

                        {data: 'action', name: 'action',class:'text-center'},

                    ]

                });     
              });
</script>
@endpush