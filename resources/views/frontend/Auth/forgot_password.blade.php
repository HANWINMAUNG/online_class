@include('frontend.layouts.header_info')
<body style="background-image:url({{asset('frontend/assets/img/gallery/forgot.png')}});" >
        @include('frontend.layouts.preloader')
            <main class="login-body">   
                            <form class="form-default" action="{{route('forgotPassword.send-email')}}" method="POST" id="form">
                                @csrf
                                <div class="login-form">
                                    <h2>Forgot Password</h2>
                                    @include('frontend.layouts.page_info')
                                    <div class="form-input">
                                        <label for="name">Email</label>
                                        <input  type="email" name="email" placeholder="Email" id="email">
                                    </div>
                                    @error('email')
                                            <small style="color:red;">{{$message}}*</small>
                                    @enderror                    
                                    <div class="form-input pt-20">
                                        <input type="submit" name="submit" value="login">
                                    </div>   
                                </div>
                            </form>  
            </main>
        @include('frontend.layouts.footer_info')
</body>
</html>