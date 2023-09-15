@extends('backend.layouts.app')
@push('header')
<link href="{{asset('css/date-picker.css')}}" rel="stylesheet"/>
@endpush
@section('content')
<main class="h-full pb-16 overflow-y-auto">
      <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Instructor Edit Form</h2>
            <div class="flex justify-items-end">
                 <a class="float-right px-4 py-2 mb-8 text-sm  text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"href="{{ route('instructor.index') }}">Back &LeftArrow;</a>
            </div>
            <form action="{{ route('instructor.update' , $instructor->id) }}" method="post" id="form" enctype="multipart/form-data">
                  @method('PATCH') 
                  @csrf
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                      <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Name<span style="color:red;">*</span></span>
                        <input type="text" name="name" id="name"value="{{ $instructor->name }}"class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                      </label>
                      @error('name')
                                <small style="color:red;">{{$message}}*</small>
                      @enderror

                      <label class="block text- sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">Email<span style="color:red;">*</span></span>
                        <input type="email" name="email" value="{{$instructor->email}}" id="email"class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                      </label>
                      @error('email')
                                <small style="color:red;">{{$message}}*</small>
                      @enderror                    

                      <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Phone<span style="color:red;">*</span></span>
                        <input type="text" name="phone" value="{{$instructor->phone}}"class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                      </label>
                      @error('phone')
                                <small style="color:red;">{{$message}}*</small>
                      @enderror

                      <label class="block text- sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">Date Of Birth<span style="color:red;">*</span></span>
                        <input type="date" id="datePicker"  name="dob" value="{{ $instructor->dob }}"class=" w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                      </label>
                      @error('dob')
                                <small style="color:red;">{{$message}}*</small>
                      @enderror

                      <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Gender<span style="color:red;">*</span></span>
                        <select name="gender" value="{{$instructor->gender}}"class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                      </label>
                      @error('gender')
                                <small style="color:red;">{{$message}}*</small>
                      @enderror

                      <label class="block mt-4 text-sm">
                              <span class="text-gray-700 dark:text-gray-400">Profile<span style="color:red;">*</span></span>
                              <input type="file" name="profile" value="{{ $instructor->profile }}"class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                      </label>
                      @if(!$instructor->profile == '')
                       <img src="{{asset('images/' . $instructor->profile)}}" alt="" style="width:100px;height:100px;padding-top:10px;" class="pt-6">
                      @else
                        <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="width:100px;height:100px;padding-top:10px;" class="pt-6">
                      @endif

                      <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Address</span>
                        <textarea type="text" name="address" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"rows="3">{{ $instructor->address }}</textarea>
                      </label>
                      @error('address')
                                <small style="color:red;">{{$message}}*</small>
                      @enderror
              
                      <div class="append" >
                            @foreach(json_decode($instructor->link,true) as  $key => $link)
                                <div class="w-full max-w-lg  border-2 relative mt-4 link_select" > 
                                            <div class="absolute top-0 right-0 mt-2 mr-2">
                                                @if($key == 0)
                                                <button class="addMore  px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"> Add more</button>
                                                @elseif($key <= count(json_decode($instructor->link,true)))
                                                <button  class="delete_button px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">Delete</button>
                                                @endif
                                            </div>
                                            <div class="p-6 "  >
                                                      <div class="flex flex-wrap -mx-3 mb-6 ">
                                                          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                              Icon
                                                            </label>
                                                            <input name="link[{{$key}}][icon]"value="{{$link['icon']}}" class="appearance-none bg-transparent border-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" >
                                                          </div>
                                                          <div class="w-full md:w-1/2 px-3">
                                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                              Link
                                                            </label>
                                                            <input name="link[{{$key}}][link]" value="{{$link['link']}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="url">
                                                          </div>
                                                      </div>
                                                      <div class="flex flex-wrap -mx-3 mb-6">
                                                        <div class="w-full px-3">
                                                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                                            Label
                                                          </label>
                                                          <input name="link[{{$key}}][label]"value="{{$link['label']}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="text" >
                                                        </div>
                                                      </div>
                                            </div>        
                              </div> 
                            @endforeach
                      </div>
                      <div class="flex mt-6 text-sm  ">
                           <div class="flex justify-items-end">
                               <button type="submit"class="px-4 py-2 text-sm font-medium leading-5 text-black transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"> Submit</button>
                           </div>
                      </div>
                </div>
            </form>
      </div>
</main>
@endsection
@push('script')
<script src="{{asset('js/date-picker.js')}}"></script>
<script>
        $(document).ready(function () {
            $(".addMore").click(function (e) {   
              e.preventDefault();  
              let count = $(".link_select").length;
              console.log(count)
        let template = `
        
        <div class="w-full max-w-lg  border-2 relative mt-4 link_select" > 
                                      <div class="absolute top-0 right-0 mt-2 mr-2">
                                        <button 
                                          class="delete_button px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                        >
                                          Delete
                                        </button>
                                        </div>
                                <div class="p-6 "  >
                                    <div class="flex flex-wrap -mx-3 mb-6 ">
                                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Icon
                                          </label>
                                          <input name="link[${count}][icon]" class="appearance-none bg-transparent border-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" >
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">
                                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                            Link
                                          </label>
                                          <input name="link[${count}][link]" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="url" >
                                        </div>
                                    </div>
                                  <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                        Label
                                      </label>
                                      <input name="link[${count}][label]" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="link_select" type="text" >
                                    </div>
                                  </div>
                                </div>
          
      </div>`;
                 
                 $(".append").append(template);
            });
            $(document).on('click', '.delete_button', function(e) {
                          e.preventDefault();
                           $(this).closest('.link_select').remove();
                            });  
             
          });
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
                                       
                                        .onSuccess((event) => {
                                            $('#form').submit();
                                           });              
</script>
@endpush

