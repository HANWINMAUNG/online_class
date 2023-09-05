@include('frontend.layouts.layouts.header_info')
<body style="background-image:url({{asset('frontend/assets/img/gallery/notice.jpg')}});" >
          @include('frontend.layouts.preloader')
              <div class="container mt-30 d-flex justify-content-center  align-middle">
                  <div class="card text-center mt-20">
                      <div class="card-body">
                        <h3 class="card-title text-success">Your Email Not Verify!</h3>
                        <p class="card-text">Please check your email verify or click to  resend button</p>
                        <a href="{{ route('verification.resend') }}" class="btn btn-primary">Resend Verification </a>
                      </div>
                  </div>
              </div>   
          @include('frontend.layouts.layouts.header_info')
</body>
</html>
