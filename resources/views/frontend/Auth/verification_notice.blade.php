@extends('frontend.layouts.app')
@section('content') 
                <section class="slider-area slider-area2">
                    <div class="slider-active" style="height:300px;">
                        <div class="single-slider slider-height2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-11 col-md-12">
                                        <div class="hero__caption hero__caption2" style="padding-top:130px;">
                                            <h1 data-animation="bounceIn" data-delay="0.2s">Email Notice</h1>
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>          
                        </div>
                    </div>
                </section>
                <div style="height:200px;">
                        <div class="container mt-30 d-flex justify-content-center  align-middle">
                            <div class="card text-center mt-20">
                                <div class="card-body">
                                    <h3 class="card-title text-success">Verify Your Email</h3>
                                    <p class="card-text">Please check your email verify and click on the verification link to verify your email address.</p>
                                    <!-- <a href="{{route('verification.resend')}}" class="btn btn-primary">Resend Verification </a> -->
                                </div>
                            </div>
                        </div>
                </div>   
@endsection
