@extends('frontend.layouts.app')
@push('header')
<link href="{{asset('frontend/assets/css/video.css')}}" rel="stylesheet"/>
@endpush
@section('content')
<main>
      <section class="slider-area slider-area2">
            <div class="slider-active" style="height:300px;">
                  <div class="single-slider slider-height2">
                        <div class="container">
                           <div class="row">
                                 <div class="col-xl-8 col-lg-11 col-md-12">
                                          <div class="hero__caption hero__caption2" style="padding-top:130px;">
                                                   <h1 data-animation="bounceIn" data-delay="0.2s">Episodes</h1>
                                                   <nav aria-label="breadcrumb">
                                                            <ol class="breadcrumb">
                                                               <li class="breadcrumb-item"><a href="index.html">course</a></li>
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
      <section class="blog_area single-post-area section-padding">
            <div class="container">
                  <div class="row">
                        @foreach($episodes->take(1) as $episode)
                        <div class="col-lg-8 posts-list">
                              <div class="single-post">
                                    <div class="feature-img">
                                       <img class="img-fluid" src="{{asset('images/' . $episode->cover)}}" alt="" style="width:700px;height:400px;">
                                    </div>
                                    <div class="blog_details">
                                          <h2 style="color: #2d2d2d;">{{$episode->title}}</h2>
                                          <ul class="blog-info-link mt-3 mb-4">
                                             <li><a href="#"><i class="fa fa-book"></i></a>Course Name:{{$episode->Course->title}}</li>
                                          </ul>
                                          <h3>Summary</h3>
                                          <p class="excert">{{$episode->summary}}</p>
                                    </div>
                              </div>
                        </div>
                        @endforeach
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
                  <div id="accordion">
                              @foreach($episodes as $episode)
                                 <div class="blog-author" style="background-color:#CC6AFF;" data-toggle="collapse" data-target="#{{$episode->id}}" aria-expanded="false" aria-controls="collapseOne">
                                       <div class="media align-items-center">
                                                @if($episode->privacy == 'public')
                                                <svg id="i-video" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="50" height="50" fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                   <path d="M22 13 L30 8 30 24 22 19 Z M2 8 L2 24 22 24 22 8 Z" />
                                                </svg>
                                                <div class="media-body pl-4">
                                                      <h4>{{$episode->title}}</h4>
                                                      <p> {{$episode->summary}}</p>
                                                </div>
                                                @else
                                                <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                                <div class="media-body pl-4">
                                                      <h4>{{$episode->title}}</h4>
                                                </div>
                                                @endif
                                       </div>
                                 </div>
                                 <div id="{{$episode->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <video
                                             id="my-video"
                                             class="video-js"
                                             controls
                                             preload="auto"
                                             width="1170"
                                             height="464"
                                             poster="MY_VIDEO_POSTER.jpg"
                                             data-setup="{}"
                                          >
                                             <source src="{{asset('videos/' . $episode->video)}}" type="video/mp4" />
                                             <p class="vjs-no-js">
                                                To view this video please enable JavaScript, and consider upgrading to a
                                                web browser that
                                             </p>
                                    </video>
                                 </div>
                              @endforeach
                  </div>
            </div>
      </section>
</main>
@endsection
@push('script')
   <script src="{{asset('frontend/assets/js/video.min.js')}}"></script>
@endpush
