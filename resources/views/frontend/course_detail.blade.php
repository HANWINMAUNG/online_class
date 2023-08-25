@extends('frontend.layouts.app')

@section('content')
<main>
   
   <section class="slider-area slider-area2">
     <div class="slider-active">
       
       <div class="single-slider slider-height2">
         <div class="container">
           <div class="row">
             <div class="col-xl-8 col-lg-11 col-md-12">
               <div class="hero__caption hero__caption2">
                 <h1 data-animation="bounceIn" data-delay="0.2s">Course Detail</h1>
                 
                 <nav aria-label="breadcrumb">
                   <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{route('courses')}}">Courses</a></li>
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
         <div class="col-lg-12 posts-list">
            <div class="single-post">
               <div class="feature-img">
                  <img class="img-fluid" src="{{asset('frontend/assets/img/blog/single_blog_2.png')}}" alt="">
               </div>
               <div class="blog_details">
                  <h2 style="color: #2d2d2d;">{{$course->title}}</h2>
                  <ul class="blog-info-link mt-3 mb-4">
                     <li><a href="#"><i class="fa fa-user"></i> Instructor Name:{{$course->Instructor->name}}</a></li>
                     <li><a href="#"><i class="fa fa-money"></i>Price:${{$course->price}}</a></li>
                  </ul>
                  <h4>Description</h4>
                  <p class="excert">
                    {{$course->description}}
                  </p>
                   <h4>
                    Summary
                   </h4>
                  <div class="quote-wrapper">
                     <div class="quotes">
                       {{$course->summary}}
                     </div>
                  </div>
               </div>
            </div>
            <div class="text-center mb-2">
               <h1>Related Episodes</h1>
            </div>
            @foreach($episodes as $episode)
            <div class="blog-author">
               <div class="media ">
                  <img src="assets/img/blog/author.png" alt="">
                  <div class="media-body">
                     <a href="#" class="mb-2">
                        <h4>Episode Title -{{$episode->title}}</h4>
                     </a>
                     <h4>Summary</h4>
                     <p>{{$episode->summary}}</p>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>     
</div>
  
</div>
</div>
</section>
</main>
@endsection