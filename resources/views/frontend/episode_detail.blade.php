@extends('frontend.layouts.app')
@push('header')
<link href="{{asset('frontend/assets/css/video.css')}}" rel="stylesheet"/>
@endpush
@section('content')
<main>
      <section class="slider-area slider-area2">
            <div class="slider-active" style="height:250px;">
                  <div class="single-slider slider-height2">
                        <div class="container">
                           <div class="row">
                                 <div class="col-xl-8 col-lg-11 col-md-12">
                                          <div class="hero__caption hero__caption2" style="padding-top:90px;">
                                                   <h1 data-animation="bounceIn" data-delay="0.2s">Episodes</h1>
                                                   <nav aria-label="breadcrumb">
                                                            <ol class="breadcrumb">
                                                               <li class="breadcrumb-item"><a href="{{route('course-detail' , $course->slug)}}">course</a></li>
                                                               <li class="breadcrumb-item"><a href="#">Episode</a></li> 
                                                            </ol>
                                                   </nav>
                                          </div>
                                 </div>
                           </div>
                        </div>          
                  </div>
            </div>
      </section>
      <div class="text-center" style="padding-top:20px;">
          <h2>Episode Video</h2>
      </div>
      <section class="blog_area single-post-area section-padding">
            <div class="container">
                  <div class="row">
                        <div class="col-lg-4 posts-list card p-4" style="height:630px;">
                                 @foreach($episodes as $episode)
                                       <div class="blog-author click" id="{{$episode->id}} " style="background-color:#b9b7bd;padding:20px 40px;margin-top:10px;" data-toggle="collapse" data-target="#{{$episode->id}}" aria-expanded="false" aria-controls="collapseOne">
                                             <div class="media align-items-center">
                                                      @if($episode->privacy == 'public')
                                                      <svg id="i-video" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="30" height="30" fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                         <path d="M22 13 L30 8 30 24 22 19 Z M2 8 L2 24 22 24 22 8 Z" />
                                                      </svg>
                                                      @else
                                                      <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                      @endif
                                                      <div class="media-body pl-4">
                                                            <h4>{{$episode->title}}</h4>
                                                      </div>
                                             </div>
                                       </div>
                                 @endforeach
                        </div>
                        <div class=" append col-lg-8 card p-4" style="height:630px;">
                              <!-- append -->
                        </div>
                  </div>
            </div>
      </section>
</main>
@endsection
@push('script')
   <script src="{{asset('frontend/assets/js/video.min.js')}}"></script>
    
<script>
      $( document ).ready(function() {
            $(document ).on( "click", '.click', function() {
                  let course_slug = "{{ $course->slug }}";
                  let video_id = $(this).attr('id');
                  $('.remove').remove();
                            $.get(`http://localhost:8000/courses/${course_slug}/episode/video` , {video_id:video_id}, (res) => {
                              $('.remove').remove();
                                       let response = JSON.parse(res)
                                       console.log(response)
                                       let path_video = "{{ asset('videos') }}"
                                       console.log(path_video);
                                       let temp =
                                       `<div class="remove">
                                          <video style="width:901px;height:400px;" controls>
                                                <source src="${path_video}/${response.video}" type="video/mp4">
                                          </video>
                                          <div>
                                                <h4 class="mt-4">
                                                Summary
                                                </h4>
                                                <div class="quote-wrapper">
                                                      <div class="quotes">
                                                            ${response.summary}
                                                      </div>
                                                </div>  
                                          </div>
                                    </div>`;
                                    $( ".append" ).html( temp )
                            }) 
                            
                              } );
                             
               });
         
</script>

@endpush
