@extends('frontend.layouts.app')
@section('content') 
                <section class="slider-area slider-area2">
                    <div class="slider-active" style="height:300px;">
                        <div class="single-slider slider-height2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-11 col-md-12">
                                        <div class="hero__caption hero__caption2" style="padding-top:130px;">
                                            <h1 data-animation="bounceIn" data-delay="0.2s">Login</h1>
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                                    <li class="breadcrumb-item"><a href="#">Login</a></li> 
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>          
                        </div>
                    </div>
                </section>
                <section class="vh-100 gradient-custom mt-6" style="background-color:#976FFF;">
                  <div class="container mt-6 py-5 h-100">
                    <div class="row justify-content-center align-items-center h-100">
                      <div class="col-12 col-lg-9 col-xl-6">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                          <div class="card-body p-4 p-md-5 mt-6">
                                <h2 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Login Form</h3>
                                <form class="form-default" action="{{route('post.login')}}" method="POST" id="form">
                                    @csrf
                                      <div class="row">
                                        <div class="col-md-12 mb-4">
                                          <div class="form-outline">
                                          <label class="form-label" >Email</label>
                                            <input type="email"name="email"  id="email" class="form-control form-control-lg" />
                                          </div>
                                          @error('email')
                                                <small style="color:red;">{{$message}}*</small>
                                          @enderror
                                        </div>
                                      </div>   
                                      <div class="row">
                                        <div class="col-md-12 mb-4 ">
                                          <div class="form-outline ">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control form-control-lg" id="password" />
                                          </div>
                                          @error('password')
                                                <small style="color:red;">{{$message}}*</small>
                                        @enderror
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remember">
                                        <label class="form-check-label text-primary ml-2" for="flexCheckDefault">Remember</label>
                                        </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                        <a href="{{route('forgotPassword.index')}}" class="text-primary">Forget Password?</a>
                                        </div>
                                      </div>
                                      <div class="mt-4 pt-2">
                                        <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                      </div>
                                </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
@endsection
