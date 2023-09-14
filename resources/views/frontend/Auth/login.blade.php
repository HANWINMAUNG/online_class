@extends('frontend.layouts.app')
@section('content') 
                <section class="slider-area slider-area2">
                    <div class="slider-active" style="height:250px;">
                        <div class="single-slider slider-height2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-11 col-md-12">
                                        <div class="hero__caption hero__caption2" style="padding-top:90px;">
                                            <h1 data-animation="bounceIn" data-delay="0.2s">Login</h1>
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
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
                <section class="vh-100 gradient-custom mt-6">
                  <div class="container mt-6 py-5 h-100">
                    <div class="row justify-content-center align-items-center h-100">
                      <div class="col-12 col-lg-9 col-xl-6">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                          <div class="card-body p-4 p-md-5 mt-6">
                                <h2 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Login Form</h3>
                                @include('frontend.layouts.page_info')
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
                                <div class="row">
                                        <div class="col-md-12 mb-4 pb-2 mt-4">
                                                 <a href="{{route('auth.socialize' , 'github')}}">
                                                       <div class="bg-secondary p-2 w-100 text-center border border-dark rounded" >
                                                                   <svg width="30px" height="30px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>github [#142]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -7559.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M94,7399 C99.523,7399 104,7403.59 104,7409.253 C104,7413.782 101.138,7417.624 97.167,7418.981 C96.66,7419.082 96.48,7418.762 96.48,7418.489 C96.48,7418.151 96.492,7417.047 96.492,7415.675 C96.492,7414.719 96.172,7414.095 95.813,7413.777 C98.04,7413.523 100.38,7412.656 100.38,7408.718 C100.38,7407.598 99.992,7406.684 99.35,7405.966 C99.454,7405.707 99.797,7404.664 99.252,7403.252 C99.252,7403.252 98.414,7402.977 96.505,7404.303 C95.706,7404.076 94.85,7403.962 94,7403.958 C93.15,7403.962 92.295,7404.076 91.497,7404.303 C89.586,7402.977 88.746,7403.252 88.746,7403.252 C88.203,7404.664 88.546,7405.707 88.649,7405.966 C88.01,7406.684 87.619,7407.598 87.619,7408.718 C87.619,7412.646 89.954,7413.526 92.175,7413.785 C91.889,7414.041 91.63,7414.493 91.54,7415.156 C90.97,7415.418 89.522,7415.871 88.63,7414.304 C88.63,7414.304 88.101,7413.319 87.097,7413.247 C87.097,7413.247 86.122,7413.234 87.029,7413.87 C87.029,7413.87 87.684,7414.185 88.139,7415.37 C88.139,7415.37 88.726,7417.2 91.508,7416.58 C91.513,7417.437 91.522,7418.245 91.522,7418.489 C91.522,7418.76 91.338,7419.077 90.839,7418.982 C86.865,7417.627 84,7413.783 84,7409.253 C84,7403.59 88.478,7399 94,7399" id="github-[#142]"> </path> </g> </g> </g> </g></svg>
                                                                    <label class="form-check-label text-dark ml-2" for="flexCheckDefault">Sign In with Git</label>
                                                        </div>
                                                 </a>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 mb-4 pb-2 ">
                                          <a href="{{route('auth.socialize' , 'google')}}">
                                                  <div class="bg-white p-2 w-100 text-center border border-dark rounded">
                                                    <svg width="30px" height="30px" viewBox="0 0 32 32" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M23.75,16A7.7446,7.7446,0,0,1,8.7177,18.6259L4.2849,22.1721A13.244,13.244,0,0,0,29.25,16" fill="#00ac47"></path><path d="M23.75,16a7.7387,7.7387,0,0,1-3.2516,6.2987l4.3824,3.5059A13.2042,13.2042,0,0,0,29.25,16" fill="#4285f4"></path><path d="M8.25,16a7.698,7.698,0,0,1,.4677-2.6259L4.2849,9.8279a13.177,13.177,0,0,0,0,12.3442l4.4328-3.5462A7.698,7.698,0,0,1,8.25,16Z" fill="#ffba00"></path><polygon fill="#2ab2db" points="8.718 13.374 8.718 13.374 8.718 13.374 8.718 13.374"></polygon><path d="M16,8.25a7.699,7.699,0,0,1,4.558,1.4958l4.06-3.7893A13.2152,13.2152,0,0,0,4.2849,9.8279l4.4328,3.5462A7.756,7.756,0,0,1,16,8.25Z" fill="#ea4435"></path><polygon fill="#2ab2db" points="8.718 18.626 8.718 18.626 8.718 18.626 8.718 18.626"></polygon><path d="M29.25,15v1L27,19.5H16.5V14H28.25A1,1,0,0,1,29.25,15Z" fill="#4285f4"></path></g></svg>
                                                    <label class="form-check-label text-dark ml-2" for="flexCheckDefault">Sign In with Google</label>
                                                  </div>
                                            </a>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 mb-4 pb-2">
                                            <button class="bg-info p-2 w-100 text-center border border-dark rounded">
                                            <svg width="30px" height="30px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Facebook-color</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Color-" transform="translate(-200.000000, -160.000000)" fill="#4460A0"> <path d="M225.638355,208 L202.649232,208 C201.185673,208 200,206.813592 200,205.350603 L200,162.649211 C200,161.18585 201.185859,160 202.649232,160 L245.350955,160 C246.813955,160 248,161.18585 248,162.649211 L248,205.350603 C248,206.813778 246.813769,208 245.350955,208 L233.119305,208 L233.119305,189.411755 L239.358521,189.411755 L240.292755,182.167586 L233.119305,182.167586 L233.119305,177.542641 C233.119305,175.445287 233.701712,174.01601 236.70929,174.01601 L240.545311,174.014333 L240.545311,167.535091 C239.881886,167.446808 237.604784,167.24957 234.955552,167.24957 C229.424834,167.24957 225.638355,170.625526 225.638355,176.825209 L225.638355,182.167586 L219.383122,182.167586 L219.383122,189.411755 L225.638355,189.411755 L225.638355,208 L225.638355,208 Z" id="Facebook"> </path> </g> </g> </g></svg>
                                            <label class="form-check-label text-dark ml-2" for="flexCheckDefault">Sign In with Facebook</label>
                                            </button>
                                        </div>
                                      </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
@endsection
