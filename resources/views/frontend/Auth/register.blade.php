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
    <link rel="stylesheet" href="{{asset('frontend/datepicker/css/bootstrap-datepicker.min.css')}}">
    <link href="{{asset('css/date-picker.css')}}" rel="stylesheet"/>
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

<body style="background-image:url({{asset('frontend/assets/img/gallery/register.jpg')}});" >
    
@include('frontend.layouts.preloader')

<main class="login-body m-4" >
    <!-- Login Admin -->
    <div class="">
    <form class="form-default" action="{{route('post.register')}}" method="POST" id="form">
          @csrf
        <div class="login-form">
           
            <h2 class="pt-4 pb-0">Registration Here</h2>

            <div class="form-input">
                <label for="name">Full name</label>
                <input  type="text" name="name" placeholder="Full name" id="name">
            </div>
            @error('name')
                        <small style="color:red;">{{$message}}*</small>
            @enderror
            <div class="form-input">
                <label for="name">Email Address</label>
                <input type="email" name="email" placeholder="Email Address" id="email">
            </div>
            @error('email')
                        <small style="color:red;">{{$message}}*</small>
            @enderror
            <div class="form-input">
                <label for="name">Password</label>
                <input type="password" name="password" placeholder="Password" id="password">
            </div>
            @error('password')
                        <small style="color:red;">{{$message}}*</small>
            @enderror
            <div class="form-input">
                <label for="name">Phone</label>
                <input type="text" name="phone" placeholder="Phone">
            </div>
            @error('phone')
                        <small style="color:red;">{{$message}}*</small>
            @enderror
            <div class="form-input">
                <label for="name">Profile</label>
                <input type="file" name="profile" >
            </div>
            @error('profile')
                        <small style="color:red;">{{$message}}*</small>
             @enderror
            <div class="form-input">
                <label for="name">Gender</label>
                <select name="gender" id="" class="form-select" aria-label="Default select example">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="form-input">
                <label for="name">Date Of Birth</label>
                <input type="date" name="dob" id="datePicker" >
            </div>
            @error('dob')
                        <small style="color:red;">{{$message}}*</small>
            @enderror
            <div class="form-input">
                <label for="name">Address</label>
                <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            
            <div class="form-input ">
                <input type="submit" name="submit" value="Registration">
            </div>
            <!-- Forget Password -->
            <a href="{{route('get.login')}}" class="registration">login</a>
        </div>
    </form>
    </div>
    <!-- /end login form -->
</main>
<!-- JS here -->
<script src="{{asset('frontend/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('frontend/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('js/date-picker.js')}}"></script>
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
                                $("#datePicker").pDatePicker({

                                    selected: new Date(),

                                    });

                        // const validation = new JustValidate('#form', {
                        //                     errorFieldCssClass: 'is-invalid',
                        //               });
                                      
                        //               validation
                        //                 .addField('#name', [
                        //                   {
                        //                     rule: 'minLength',
                        //                     value: 3,
                        //                   },
                        //                   {
                        //                     rule: 'maxLength',
                        //                     value: 30,
                        //                   },
                        //                 ])
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