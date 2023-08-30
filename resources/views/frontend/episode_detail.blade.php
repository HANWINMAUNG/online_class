@extends('frontend.layouts.app')
@push('header')
<link href="{{asset('frontend/assets/css/video.css')}}" rel="stylesheet"/>
@endpush
@section('content')
<main>
   <!--? slider Area Start-->
   <section class="slider-area slider-area2">
     <div class="slider-active">
       <!-- Single Slider -->
       <div class="single-slider slider-height2">
         <div class="container">
           <div class="row">
             <div class="col-xl-8 col-lg-11 col-md-12">
               <div class="hero__caption hero__caption2">
                 <h1 data-animation="bounceIn" data-delay="0.2s">Episodes</h1>
                 <!-- breadcrumb Start-->
                 <nav aria-label="breadcrumb">
                   <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.html">course</a></li>
                     <li class="breadcrumb-item"><a href="#">Blog</a></li> 
                  </ol>
               </nav>
               <!-- breadcrumb End -->
            </div>
         </div>
      </div>
   </div>          
</div>
</div>
</section>
<!--? Blog Area Start -->
<section class="blog_area single-post-area section-padding">
   <div class="container">
      <div class="row">
         @foreach($episodes->take(1) as $episode)
         <div class="col-lg-8 posts-list">
            <div class="single-post">
               <div class="feature-img">
                  <img class="img-fluid" src="{{asset('frontend/assets/img/blog/single_blog_1.png')}}" alt="">
               </div>
               <div class="blog_details">
                  <h2 style="color: #2d2d2d;">{{$episode->title}}</h2>
                  <ul class="blog-info-link mt-3 mb-4">
                     <li><a href="#"><i class="fa fa-book"></i></a>Course Name:{{$episode->Course->title}}</li>
                  </ul>
                  <h3>Summary</h3>
                  <p class="excert">
                  {{$episode->summary}}
                  </p>
               </div>
            </div>
         </div>
         @endforeach
         <div class="col-lg-4">
            <div class="blog_right_sidebar">
               <aside class="single_sidebar_widget popular_post_widget">
                  <h3 class="widget_title" style="color: #2d2d2d;">Instructor</h3>
                  <div class="media post_item text-center">
                     <img src="{{asset('frontend/assets/img/post/post_1.png')}}" alt="post" style="width:200px;height:200px;text-align:center;">
                  </div>
                  <div class="media post_item">
                  <i class="fa fa-user"></i>
                     <div class="media-body">
                        <a href="blog_details.html">
                           <h3 style="color: #2d2d2d;">{{$course->Instructor->name}}</h3>
                        </a>
                     </div>
                  </div>
                  <div class="media post_item">
                  <i class="fa fa-phone"></i>
                     <div class="media-body">
                        <a href="blog_details.html">
                           <h3 style="color: #2d2d2d;">{{$course->Instructor->phone}}</h3>
                        </a>
                     </div>
                  </div>
                  <div class="media post_item">
                  <i class="fa fa-envelope"></i>
                     <div class="media-body">
                        <a href="blog_details.html">
                           <h3 style="color: #2d2d2d;">{{$course->Instructor->email}}</h3>
                        </a>
                     </div>
                  </div>
               </aside>
            </div>
         </div>
     </div>
     
     <div class="row">
                     <div class="col-4 card">
                     @foreach($episodes as $episode)
                        <div class="blog-author bg-muted">
                           <div class="media align-items-center">
                           <svg id="i-video" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="50" height="50" fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                 <path d="M22 13 L30 8 30 24 22 19 Z M2 8 L2 24 22 24 22 8 Z" />
                              </svg>
                              <div class="media-body pl-4">
                                 <a href="#">
                                    <h4>{{$episode->title}}</h4>
                                 </a>
                                 <p> {{$episode->summary}}</p>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
            
                  <div class="col-8 card">
                        <div style=" padding-top:100px;">
                           <video
                                    id="my-video"
                                    class="video-js"
                                    controls
                                    preload="auto"
                                    width="768"
                                    height="464"
                                    poster="MY_VIDEO_POSTER.jpg"
                                    data-setup="{}"
                                 >
                                    <source src="MY_VIDEO.mp4" type="video/mp4" />
                                    <p class="vjs-no-js">
                                       To view this video please enable JavaScript, and consider upgrading to a
                                       web browser that
                                    </p>
                            </video>
                        </div>
                  </div>
     </div>
  </div>
</section>

</main>
@endsection
@push('script')
   <script src="{{asset('frontend/assets/js/video.min.js')}}"></script>
@endpush
