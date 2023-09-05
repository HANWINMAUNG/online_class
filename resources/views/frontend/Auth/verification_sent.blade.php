@include('frontend.layouts.layouts.header_info')
<body style="background-image:url({{asset('frontend/assets/img/gallery/sent.jpg')}});">
          @include('frontend.layouts.preloader')
          <div class="container mt-30 d-flex justify-content-center  align-middle">
               <div class="card text-center mt-20  ">
                  <div class="card-body">
                    <h3 class="card-title text-success">Successfully sent!</h3>
                    <p class="card-text"> Your verification link successfully sent.Please check your email and click to verify.</p>
                    <a href="{{route('get.login')}}" class="btn btn-primary">Sign In</a>
                  </div>
               </div>
          </div>     
          @include('frontend.layouts.layouts.footer_info')
</body>
</html>

