@extends('backend.layouts.app')
@section('content')
<main class="h-full pb-16 overflow-y-auto">
      <div class="container px-6 mx-auto grid">
                <h2 class = "my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Category Create Form</h2>
                <div class = "flex justify-items-end">
                      <a class = "float-right p-4 mb-8 text-sm  text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"href="{{ route('category.index') }}"> &LeftArrow;</a>
                </div>
                <form action = "{{ route('category.store') }}" method = "post" id = "form">
                      @csrf
                      <div class = "px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class = "block text-sm">
                                <span class = "text-gray-700 dark:text-gray-400">Title<span style = "color:red;">*</span></span>
                                <input type = "text" name = "title" class = "block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"id="title"/>
                            </label>
                            @error('title')
                                      <small style = "color:red;">{{ $message }}*</small>
                            @enderror
                            <div class = "flex mt-6 text-sm  ">
                                    <div class="flex justify-items-end">
                                            <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-black transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"> Submit</button>
                                    </div>
                            </div>
                      </div>
                </form>
      </div>
</main>
@endsection
@push('script')
                  <script>
                                      const validation = new JustValidate('#form', {
                                            errorFieldCssClass: 'is-invalid',
                                      }); 
                                      validation
                                        .addField('#title', [
                                          {
                                            rule: 'minLength',
                                            value: 3,
                                          },
                                          {
                                            rule: 'maxLength',
                                            value: 30,
                                          },
                                        ])
                                      
                                        .onSuccess((event) => {
                                            $('#form').submit();
                                           });
                  </script>
@endpush

