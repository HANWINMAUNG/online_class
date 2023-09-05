@extends('backend.layouts.app')

@section('content')
<main class = "h-full pb-16 overflow-y-auto">
    <div class = "container px-6 mx-auto grid">
            <h2 class = "my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"> Course Edit Form</h2>
            <div class = "flex justify-items-end">
                  <a class="float-right p-4 mb-8 text-sm  text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="{{ route('course.index') }}"> Back &LeftArrow;</a>
            </div>
            <form action = "{{ route('course.update' , $course->id) }}" method = "post" id = "form" enctype = "multipart/form-data">
                @method('PATCH')
                @csrf
               <div class = "px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                   <label class = "block text-sm">
                        <span class = "text-gray-700 dark:text-gray-400">Title<span style = "color:red;">*</span></span>
                        <input type = "text" name = "title" id = "title" value = "{{ $course->title }}" class = "block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                   </label>  
                   @error('title')
                            <small style = "color:red;">{{ $message }}*</small>
                   @enderror

                   <label class = "block mt-4 text-sm">
                        <span class = "text-gray-700 dark:text-gray-400">Instructor Name<span style = "color:red;">*</span></span> 
                        <select name = "instructor_id"class = "block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                  @foreach($instructors  as $instructor )
                                    <option value = "{{ $course->instructor_id }}">{{ $course->Instructor->name }}</option>
                                    <option value = "{{ $instructor->id }}">{{ $instructor->name }}</option>
                                  @endforeach
                        </select>
                   </label>
                   @error('instructor_name')
                            <small style = "color:red;">{{ $message }}*</small>
                   @enderror

                  <label class = "block mt-4 text-sm">
                         <span class="text-gray-700 dark:text-gray-400">Category Name<span style="color:red;">*</span></span>
                         <select name="category[]" id="category"class="select2 block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"multiple>
                                       @foreach($categories as $key =>$category)
                                         @foreach($category_courses as $keys =>$category_course)
                                              @if($keys == $key)
                                              <option value="{{$key}}" selected>{{$category}}</option>
                                              @endif
                                         @endforeach
                                      @endforeach
                         </select>
                  </label>

                  <label class = "block mt-4 text-sm">
                      <span class = "text-gray-700 dark:text-gray-400">Price<span style = "color:red;">*</span></span>
                      <input type = "number" name = "price" value = "{{ $course->price }}"class = "block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                  </label>
                  @error('price')
                            <small style="color:red;">{{ $message }}*</small>
                  @enderror

                  <label class = "block mt-4 text-sm">
                            <span class = "text-gray-700 dark:text-gray-400">Image<span style = "color:red;">*</span></span>
                            <input type = "file" name = "image" value="{{ $course->image }}"class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                  </label>
                  @error('image')
                            <small style = "color:red;">{{ $message }}*</small>
                  @enderror

                  <label class = "block mt-4 text-sm">
                        <span class = "text-gray-700 dark:text-gray-400">Cover Photo<span style = "color:red;">*</span></span>
                        <input type = "file" name = "cover_photo" value="{{ $course->cover_photo }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                  </label>
                  @error('cover_photo')
                            <small style = "color:red;">{{ $message }}*</small>
                  @enderror

                  <label class="block mt-4 text-sm">
                          <span class="text-gray-700 dark:text-gray-400">Description</span>
                          <textarea type="text" name="description"class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" id="description">{{ $course->description }}</textarea>
                  </label>
                  @error('description')
                            <small style="color:red;">{{ $ }}*</small>
                  @enderror
  
                  <label class = "block mt-4 text-sm">
                        <span class = "text-gray-700 dark:text-gray-400">Summary</span>
                        <textarea type = "text" name = "summary" id = "inp_editor1"class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3">{{ $course->summary }}</textarea>
                  </label>
                  @error('summary')
                            <small style="color:red;">{{$message}}*</small>
                  @enderror
                  <div class="flex mt-6 text-sm  ">
                      <div class="flex justify-items-end">
                         <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-black transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Submit</button>
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
                                                .addField('#description', [
                                                      {
                                                      rule: 'required',
                                                      },
                                                        ])
                                                        .addField('#title', [
                                                      {
                                                      rule: 'required',
                                                      },
                                                        ])
                                                        .onSuccess((event) => {
                                                    $('#form').submit();
                                                  });
</script>
@endpush
