@extends('backend.layouts.app')
@section('content')
<main class="h-full pb-16 overflow-y-auto">
     <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Episode Edit Form</h2>
            <div class="flex justify-items-end">
                   <a class="float-right p-4 mb-8 text-sm  text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"href="{{route('episode.index',[$episode->Course->id])}}">Back &LeftArrow;</a>
            </div>
            <form action="{{route('episode.update',[$episode->Course->id,$episode->id])}}" method="post" id="form" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block text-sm">
                         <span class="text-gray-700 dark:text-gray-400">Title<span style="color:red;">*</span></span>
                         <input type="text" name="title" id="title" value="{{$episode->title}}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    </label>  
                    @error('title')
                              <small style="color:red;">{{$message}}*</small>
                    @enderror

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Privacy<span style="color:red;">*</span></span>
                        <select name="privacy"class=" block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    @if($episode->privacy == 'Public')
                                       <option selected>Public</option>
                                       <option>Private</option> 
                                    @else
                                        <option selected>Private</option>
                                        <option >Public</option> 
                                    @endif
                        </select>
                    </label> 

                    <label class="block mt-4 text-sm">
                       <span class="text-gray-700 dark:text-gray-400">image<span style="color:red;">*</span></span>
                       <input type="file" name="image" value="{{ $episode->image }}"class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    </label>
                    @error('image')
                              <small style="color:red;">{{$message}}*</small>
                    @enderror

                    <label class="block mt-4 text-sm">
                          <span class="text-gray-700 dark:text-gray-400">Cover<span style="color:red;">*</span></span>
                          <input type="file" name="cover"  value="{{ $episode->cover }}"class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    </label>
                    @error('cover')
                            <small style="color:red;">{{$message}}*</small>
                    @enderror

                    <label class="block mt-4 text-sm">
                         <span class="text-gray-700 dark:text-gray-400">Video<span style="color:red;">*</span></span>
                         <input type="file" name="video"class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                    </label>
                    @error('video')
                              <small style="color:red;">{{$message}}*</small>
                    @enderror
                
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Summary</span>
                        <textarea type="text" name="summary" id="inp_editor1"class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"rows="3">{{ $episode->summary }}</textarea>
                    </label>
                    @error('summary')
                              <small style="color:red;">{{$message}}*</small>
                    @enderror
              
                    <div class="flex mt-6 text-sm  ">
                       <div class="flex justify-items-end">
                          <button type="submit"class="px-4 py-2 text-sm font-medium leading-5 text-black transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Submit</button>
                       </div>
                    </div>
                </div>
            </form>
    </div>
</main>
@endsection
@push('script')
<script>
  $(document).ready(function() {
                          $('.select2').select2({
                            theme:'classic',
                            placeholder: '--Please Chose--',
                            allowClear:true
                          });
                      });
      var editor1 = new RichTextEditor("#inp_editor1");
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
