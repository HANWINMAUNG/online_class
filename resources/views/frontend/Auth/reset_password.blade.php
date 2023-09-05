@include('frontend.layouts.layouts.header_info')
<body style="background-image:url({{asset('frontend/assets/img/gallery/login.jpg')}});" >
    @include('frontend.layouts.preloader')
                <main class="login-body">  
                        <form class="form-default" action="{{route('resetPassword.reset')}}" method="POST" id="form">
                            @csrf
                            <div class="login-form">
                                
                                
                                <h2>Reset Password</h2>

                                @include('frontend.layouts.page_info')
                                <div class="form-input">
                                    <label for="name">Password</label>
                                    <input type="password" name="password" placeholder="Password" id="password">
                                </div>
                                @error('password')
                                        <small style="color:red;">{{$message}}*</small>
                                @enderror
                                
                                <div class="form-input pt-20">
                                    <input type="submit" name="submit" value="Reset">
                                </div>
                        </form>    
                </main>
    @include('frontend.layouts.layouts.footer_info')
</body>
</html>