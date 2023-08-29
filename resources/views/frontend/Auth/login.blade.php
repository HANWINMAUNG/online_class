<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Courses | Education</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/progressbar_barfiller.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    
</head>

<body style="background-color:#976FFF;" >

@include('frontend.layouts.preloader')
<section class="vh-100 gradient-custom mt-6">
  <div class="container mt-6 py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-6" style="margin-top: 100px;">
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


<script src="{{asset('frontend/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('frontend/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>


<script src="{{asset('js/just-validate.production.min.js')}}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{asset('frontend/assets/js/jquery.slicknav.min.js')}}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/animated.headline.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.magnific-popup.js')}}"></script>

<!-- Date Picker -->
<script src="{{asset('frontend/assets/js/gijgo.min.js')}}"></script>
<!-- Nice-select, sticky -->
<script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.sticky.js')}}"></script>
<!-- Progress -->
<script src="{{asset('frontend/assets/js/jquery.barfiller.js')}}"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="{{asset('frontend/assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/hover-direction-snake.min.js')}}"></script>

<!-- contact js -->
<script src="{{asset('frontend/assets/js/contact.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.form.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/mail-script.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="{{asset('frontend/assets/js/plugins.js')}}"></script>
<script src="{{asset('frontend/assets/js/main.js')}}"></script>
<script>
                              
                        // const validation = new JustValidate('#form', {
                        //                     errorFieldCssClass: 'is-invalid',
                        //               });
                                      
                        //               validation
                                    
                        //                 .addField('#email', [
                        //                   {
                        //                     rule: 'required',
                        //                     errorMessage: 'Field is required',
                        //                   },
                        //                   {
                        //                     rule: 'email',
                        //                     errorMessage: 'Email is invalid!',
                        //                   },
                        //                 ])
                        //                 .addField('#password', [
                        //                   {
                        //                     rule: 'password',
                        //                   },
                        //                 ])
                        //                 .onSuccess((event) => {
                        //                     $('#form').submit();
                        //                    });
</script>

</body>
</html>