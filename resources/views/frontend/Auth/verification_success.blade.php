@include('frontend.layouts.header_info')
<body style="background-image:url({{asset('frontend/assets/img/gallery/success.jpg')}});" >
        @include('frontend.layouts.preloader')
        <div class="container mt-30 d-flex justify-content-center  align-middle">       
            <div class="card text-center mt-20">
                <div class="card-body">
                  <h3 class="card-title text-success">Successfully verified!</h3>
                  <p class="card-text">Your have been  verified email successfully.Please login    to see your content.</p>
                  <a href="{{route('get.login')}}" class="btn btn-primary">Sign In</a>
                </div>
            <div>
        </div>
        @include('frontend.layouts.footer_info')
</body>
</html>

