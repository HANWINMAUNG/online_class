@extends('backend.layouts.app')
@push('header')
     <link href = "{{ asset('css/date-picker.css') }}" rel = "stylesheet"/>
@endpush
@section('content')
<main class = "h-full pb-16 overflow-y-auto">
    <div class = "container px-6 mx-auto grid">
            <h2 class = "my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Admin Create Form</h2>
            <div class = "flex justify-items-end">
                <a class = "float-right px-4 py-2 mb-8 text-sm  text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"href = "{{ route('admin.index') }}">
                  Back &LeftArrow;
                </a>
            </div>
            <form action = "{{ route('admin.store') }}" method = "post" id = "form" enctype = "multipart/form-data">
              @csrf
              <div class = "px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                  <label class = "block text-sm">
                      <p class = "text-gray-700 dark:text-gray-400">Name<span style = "color:red;">*</span></p>
                      <input type = "text" id = "name" name = "name" class = " block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                  </label>
                  @error('name')
                          <small style = "color:red;">{{ $message }}*</small>
                  @enderror
                
                  <label class = "block text- sm mt-4">
                      <span class = "text-gray-700 dark:text-gray-400">Email <span style = "color:red;">*</span></span>
                      <input type = "email" name = "email" id = "email" class = " email block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                  </label>
                  @error('email')
                          <small style = "color:red;">{{ $message }}*</small>
                  @enderror

                  <label class = "block mt-4 text-sm">
                      <span class = "text-gray-700 dark:text-gray-400">Password<span style = "color:red;">*</span></span>
                      <input type = "password" name = "password" id = "password" class = " block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                  </label>
                  @error('password')
                          <small style = "color:red;">{{ $message }}*</small>
                  @enderror
                  
                  <label class = "block mt-4 text-sm">
                      <span class = "text-gray-700 dark:text-gray-400">Phone<span style = "color:red;">*</span></span>
                      <input type = "text" name = "phone" id = "phone"class = "block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                  </label>
                  @error('phone')
                          <small style = "color:red;">{{ $message }}*</small>
                  @enderror
                  
                  <label class = "block text- sm mt-4">
                      <span class = "text-black-700 dark:text-gray-400">Date Of Birth<span style = "color:red;">*</span></span>
                      <input type = "date" id = "datePicker"  name = "dob" class = " w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                  </label>
                  @error('dob')
                          <small style = "color:red;">{{ $message }}*</small>
                  @enderror

                  <label class = "block mt-4 text-sm">
                    <span class = "text-gray-700 dark:text-gray-400">Gender <span style = "color:red;">*</span></span>
                    <select name = "gender"class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                          <option selected>Male</option>
                          <option>Female</option>
                          <option>Other</option>
                    </select>
                  </label>
                  @error('gender')
                          <small style = "color:red;">{{ $message }}*</small>
                  @enderror

                  <label class = "block mt-4 text-sm">
                        <span class = "text-gray-700 dark:text-gray-400">Profile<span style = "color:red;">*</span></span>
                        <input type = "file" name = "profile" class = "block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                  </label>
                  @error('profile')
                          <small style = "color:red;">{{ $message }}*</small>
                  @enderror

                  <label class = "block mt-4 text-sm">
                      <span class = "text-gray-700 dark:text-gray-400">Address</span>
                      <textarea type = "text" name = "address"class = "block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"rows="3"></textarea>
                  </label>
                  @error('address')
                          <small style = "color:red;">{{ $message }}*</small>
                  @enderror
                
                  <div class = "flex mt-6 text-sm  ">
                      <div class = "flex justify-items-end">
                            <button type = "submit"class = "px-4 py-2 text-sm font-medium leading-5 text-black transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Submit</button>
                      </div>
                  </div>
              </div>
            </form>
    </div>
</main>
@endsection
@push('script')
<script src="{{ asset('js/date-picker.js') }}"></script>
                  <script>
                                      const validation = new JustValidate('#form', {
                                            errorFieldCssClass: 'is-invalid',
                                      });
                                      validation
                                        .addField('#name', [
                                          {
                                            rule: 'minLength',
                                            value: 3,
                                          },
                                          {
                                            rule: 'maxLength',
                                            value: 30,
                                          },
                                        ])
                                        .addField('#email', [
                                          {
                                            rule: 'required',
                                            errorMessage: 'Field is required',
                                          },
                                          {
                                            rule: 'email',
                                            errorMessage: 'Email is invalid!',
                                          },
                                        ])
                                        .addField('#password' , [
                                          {
                                            rule: 'password',
                                          },
                                        ])
                                        .onSuccess((event) => {
                                            $('#form').submit();
                                           });                                                                    
                  </script>
@endpush


