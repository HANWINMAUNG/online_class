@extends('frontend.layouts.app')

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
                 <h1 data-animation="bounceIn" data-delay="0.2s">Course Detail</h1>
                 <!-- breadcrumb Start-->
                 <nav aria-label="breadcrumb">
                   <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{route('courses')}}">Courses</a></li>
                     <li class="breadcrumb-item"><a href="#">Course Detail</a></li> 
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
         <div class="col-lg-8 posts-list">
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
            <div class="navigation-top">
               <div class="d-sm-flex justify-content-between text-center">
                  <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                  people like this</p>
                  <div class="col-sm-4 text-center my-2 my-sm-0">
                     <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                  </div>
                  <ul class="social-icons">
                     <li><a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                     <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                     <li><a href="#"><i class="fab fa-behance"></i></a></li>
                  </ul>
               </div>
               <div class="navigation-area">
                  <div class="row">
                     <div
                     class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                     <div class="thumb">
                        <a href="#">
                           <img class="img-fluid" src="assets/img/post/preview.png" alt="">
                        </a>
                     </div>
                     <div class="arrow">
                        <a href="#">
                           <span class="lnr text-white ti-arrow-left"></span>
                        </a>
                     </div>
                     <div class="detials">
                        <p>Prev Post</p>
                        <a href="#">
                           <h4 style="color: #2d2d2d;">Space The Final Frontier</h4>
                        </a>
                     </div>
                  </div>
                  <div
                  class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                  <div class="detials">
                     <p>Next Post</p>
                     <a href="#">
                        <h4 style="color: #2d2d2d;">Telescopes 101</h4>
                     </a>
                  </div>
                  <div class="arrow">
                     <a href="#">
                        <span class="lnr text-white ti-arrow-right"></span>
                     </a>
                  </div>
                  <div class="thumb">
                     <a href="#">
                        <img class="img-fluid" src="assets/img/post/next.png" alt="">
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="blog-author">
         <div class="media align-items-center">
            <img src="assets/img/blog/author.png" alt="">
            <div class="media-body">
               <a href="#">
                  <h4>Harvard milan</h4>
               </a>
               <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
               our dominion twon Second divided from</p>
            </div>
         </div>
      </div> 
   </div>
   <div class="col-lg-4">
      <div class="blog_right_sidebar">
         <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title" style="color: #2d2d2d;">Category</h4>
            <ul class="list cat-list">
               <li>
                  <a href="#" class="d-flex">
                     <p>Resaurant food</p>
                     <p>(37)</p>
                  </a>
               </li>
               <li>
                  <a href="#" class="d-flex">
                     <p>Travel news</p>
                     <p>(10)</p>
                  </a>
               </li>
               <li>
                  <a href="#" class="d-flex">
                     <p>Modern technology</p>
                     <p>(03)</p>
                  </a>
               </li>
               <li>
                  <a href="#" class="d-flex">
                     <p>Product</p>
                     <p>(11)</p>
                  </a>
               </li>
               <li>
                  <a href="#" class="d-flex">
                     <p>Inspiration</p>
                     <p>(21)</p>
                  </a>
               </li>
               <li>
                  <a href="#" class="d-flex">
                     <p>Health Care</p>
                     <p>(21)</p>
                  </a>
               </li>
            </ul>
         </aside>
      </div>
   </div>
</div>
</div>
</section>
<!-- Blog Area End -->
</main>
@endsection