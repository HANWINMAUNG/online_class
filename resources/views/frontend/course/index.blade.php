@extends('frontend.layouts.app')
@section('content') 
<main>     
        <section class="slider-area slider-area2">
            <div class="slider-active" style="height:300px;">
                <div class="single-slider slider-height2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-11 col-md-12">
                                <div class="hero__caption hero__caption2" style="padding-top:130px;">
                                    <h1 data-animation="bounceIn" data-delay="0.2s">Our courses</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Services</a></li> 
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </section>
        <div class="courses-area section-padding40 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Our featured courses</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                    <select class="pl-3 py-4 m-4 w-50 category_select">
                        <option  disabled selected>Category</option>
                        @foreach($categories as $key => $category)
                            <option value="{{ $key }}" {{ request('category_id') == $key ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-lg-3">
                    <div class="text-lg-right">
                    <form method="GET" action="{{ route('courses')}}">
                        <input type="text" name="search" value="{{request('search') ?? ''}}" placeholder="Find something"
                               class="p-4 m-4 " style="width:340px;">
                    </form>
                    </div>
                    </div>
                </div>
                <div class="row">
                  @if($courses->count()>0)
                    @foreach($courses as $course)
                    <div class="col-lg-4">
                        <div class="properties properties2 mb-30">
                            <div class="properties__card">
                                <div class="properties__img overlay1">
                                    <a href="#"><img src="{{asset('images/' . $course->image)}}" alt="" style="width:340px;height:206px;"></a>
                                </div>
                                <div class="properties__caption">
                                    <p>Instructor Name - {{Str::limit($course->Instructor->name,15,'...')}}</p>
                                    <h3><a href="#">{{$course->title}}</a></h3>
                                    <p>{{Str::limit($course->description,30,'...')}}</p>
                                    <div class="properties__footer d-flex justify-content-between align-items-center">
                                        <div class="price">
                                            <span>${{$course->price}}</span>
                                        </div>
                                    </div>
                                    <a href="{{route('course-detail',[$course->slug])}}" class="border-btn border-btn2">Find out more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{$courses->links()}}
                    @else
                    <p class=" text-center text-danger font-weight-bold">
                        No record found!
                    </p> 
                  @endif
                </div>
            </div>
        </div>
        <div class="topic-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Explore top Categories</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="{{asset('frontend/assets/img/gallery/topic1.png')}}" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="{{asset('frontend/assets/img/gallery/topic2.png')}}" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="{{asset('frontend/assets/img/gallery/topic3.png')}}" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="{asset('frontend/assets/img/gallery/topic2.png')}}" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="{{asset('frontend/assets/img/gallery/topic7.')}}'" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="{{asset('frontend/assets/img/gallery/topic6.png')}}" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="{{asset('frontend/assets/img/gallery/topic7.png')}}" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="{{asset('frontend/assets/img/gallery/topic8.png')}}" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
</main>
@endsection
@push('script')
<script>
            $(function(){
                $('.category_select').on('change',function(){
                    let current_category = $(this).val();
                    let change_location = "{{ route('courses') }}";

                    window.location = `${change_location}?category_id=${current_category}`;
                });
            })
</script>
@endpush