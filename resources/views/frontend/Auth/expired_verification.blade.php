@include('frontend.layouts.header_info')
<body style="background-image:url({{asset('frontend/assets/img/gallery/expired.jpg')}});" >
        @include('frontend.layouts.preloader')
        <div class="container mt-30 d-flex justify-content-center  align-middle">
                <div class="card text-center mt-20">
                        <div class="card-body">
                          <h3 class="card-title text-success">Expired Verification!</h3>
                          <p class="card-text">Your verification lind was expired .Please send new verification link by clicking on the resend button at below.</p>
                          <a href="{{route('verification.resend')}}" class="btn btn-primary"> Resend Verification </a>
                        </div>
                </div>
        </div>    
        @include('frontend.layouts.header_info')
</body>
</html>