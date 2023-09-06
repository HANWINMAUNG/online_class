@include('frontend.layouts.header_info')
<body style="background-color:#976FFF;">  
          @include('frontend.layouts.preloader')
                <section class="vh-100 gradient-custom mt-6">
                  <div class="container mt-6 py-5 h-100">
                    <div class="row justify-content-center align-items-center h-100">
                      <div class="col-12 col-lg-9 col-xl-8" style="margin-top: 30px;">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                          <div class="card-body p-4 p-md-5 mt-6">
                                  <h2 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Registration Form</h3>
                                  <form class="form-default" action="{{route('post.register')}}" method="POST" id="form" enctype="multipart/form-data">
                                                @csrf
                                                      <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                          <div class="form-outline">
                                                          <label class="form-label" >Name</label>
                                                            <input type="text"name="name"  id="name" class="form-control form-control-lg" />
                                                          </div>
                                                          @error('name')
                                                                <small style="color:red;">{{$message}}*</small>
                                                          @enderror
                                                        </div>
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-md-6 mb-4 ">
                                                          <div class="form-outline ">
                                                            <label class="form-label">Password</label>
                                                            <input type="password" name="password" class="form-control form-control-lg" id="password" />
                                                          </div>
                                                          @error('password')
                                                                <small style="color:red;">{{$message}}*</small>
                                                        @enderror
                                                        </div>
                                                        <div class="col-md-6 mb-4 pb-2">
                                                          <div class="form-outline">
                                                          <label class="form-label">Date Of Birth</label>
                                                            <input type="date" name="dob"  class="form-control form-control-lg pb-2" />
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-md-6 mb-4 pb-2">
                                                          <div class="form-outline">
                                                          <label class="form-label" for="emailAddress">Email</label>
                                                            <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                                          </div>
                                                          @error('email')
                                                                <small style="color:red;">{{$message}}*</small>
                                                        @enderror
                                                        </div>                            
                                                        <div class="col-md-6 mb-4 pb-2">
                                                          <div class="form-outline">
                                                          <label class="form-label" for="phoneNumber">Phone Number</label>
                                                            <input type="text"  name="phone"class="form-control form-control-lg" />
                                                          </div>
                                                          @error('phone')
                                                                <small style="color:red;">{{$message}}*</small>
                                                        @enderror
                                                        </div>
                                                      </div>  
                                                      <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                          <div class="form-outline">
                                                            <label>Gender</label>
                                                            <select name="gender" class="form-select ">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                            <option>Other</option>
                                                          </select>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                          <div class="form-outline">
                                                          <label class="form-label" >Profile</label>
                                                            <input type="file" name="profile" class="form-control form-control-lg" />
                                                          </div>
                                                          @error('profile')
                                                                <small style="color:red;">{{$message}}*</small>
                                                          @enderror
                                                        </div>
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-md-12 mb-4">
                                                          <div class="form-outline">
                                                          <label class="form-label" >Address</label>
                                                            <textarea id="firstName" name="address" class="form-control form-control-lg"></textarea>
                                                          </div>
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
          @include('frontend.footer_info')
</body>
</html>