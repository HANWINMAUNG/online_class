@extends('frontend.layouts.app')
@section('content')
<main>
      <section class="slider-area slider-area2">
               <div class="slider-active" style="height:250px;">
                     <div class="single-slider slider-height2">
                           <div class="container">
                              <div class="row">
                                    <div class="col-xl-8 col-lg-11 col-md-12">
                                          <div class="hero__caption hero__caption2" style="padding-top:90px;">
                                             <h1 data-animation="bounceIn" data-delay="0.2s">Course Detail</h1>
                                             <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                   <li class="breadcrumb-item"><a href="{{ route('courses') }}">Courses</a></li>
                                                   <li class="breadcrumb-item"><a href="#">Course Detail</a></li> 
                                                </ol>
                                             </nav>
                                          </div>
                                    </div>
                              </div>
                           </div>          
                     </div>
               </div>
      </section>
      <section class="blog_area single-post-area section-padding">
         <div class="container">
               <div class="row">
                     <div class="col-lg-6 posts-list">
                        <div class="single-post">
                           <div class="feature-img">
                              <img class="image-fluid" src="{{asset('images/' . $course->image)}}" alt="image" style="width:550px;height:auto">
                           </div>
                        </div>
                        <div class="blog_details">
                              <h2 style="color: #2d2d2d;">{{ $course->title }}</h2>
                              <ul class="blog-info-link mt-3 mb-4">
                                 <li><a href="#"><i class="fa fa-user"></i> Instructor Name:{{ $course->Instructor->name }}</a></li>
                                 <li><a href="#"><i class="fa fa-money"></i>Price:${{ $course->price }}</a></li>
                              </ul>
                              <h4>Description</h4>
                              <p class="excert">
                              {{ $course->description }}
                              </p>
                        </div>
                     </div>
                     <div class="col-lg-4">
                           <div class="blog_right_sidebar">
                                 <aside class="single_sidebar_widget popular_post_widget">
                                       <h3 class="widget_title" style="color: #2d2d2d;">Instructor</h3>
                                       <div class="media post_item text-center">
                                          <img src="{{asset('images/' . $course->Instructor->profile)}}" alt="image" style="width:200px;height:200px;text-align:center;">
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
                  <div class="col-lg-12">
                  <h4 class="mt-4">
                           Summary
                           </h4>
                           <div class="quote-wrapper">
                              <div class="quotes">
                              {{ $course->summary }}
                              </div>
                           </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="text-center mb-2">
                        <h1>Related Episodes</h1>
                     </div>
                     <a href="{{ route('episode-detail' , [$course->slug]) }}">
                           <div class="blog-author" style="background-color:#CC6AFF;">
                              <div class="media ">
                                    <svg id="i-video" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="100" height="100" fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                       <path d="M22 13 L30 8 30 24 22 19 Z M2 8 L2 24 22 24 22 8 Z" />
                                    </svg></i>
                                 <div class="media-body pl-4">
                                    <a href="#" class="mb-2">
                                       <h4>Episode</h4>
                                    </a>
                                    <p>See More...</p>
                                 </div>
                              </div>
                           </div>
                     </a>
                  </div>
               </div>    
         </div>
      </section>
</main>
@endsection