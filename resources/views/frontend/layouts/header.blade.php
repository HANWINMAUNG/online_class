<header>
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <img style="width:60px;height:60px;" src="{{asset('frontend/assets/img/logo/logo.png')}}" alt=""><span class="pl-4 font-weight-bold h2">Oline Course</span>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">                                                                                          
                                                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                                                <li><a href="{{ route('courses') }}">Courses</a></li>
                                                <li><a href="{{ route('about') }}">About</a></li>
                                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                                @if(auth()->user())
                                                <li class="button-header margin-left "><a href="" class="text-dark">{{ auth()->user()->name }}</a></li>
                                                <li class="button-header"><a href="{{ route('logout') }}" class="btn btn3">Logout</a></li>
                                                @else
                                                <li class="button-header margin-left "><a href="{{ route('get.register') }}" class="btn">Register</a></li>
                                                <li class="button-header p-2"><a href="{{ route('get.login') }}" class="btn btn3">Log in</a></li>
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>