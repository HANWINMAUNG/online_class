@if($errors->any())
 <div style="color:red">
    <ul>
       @foreach($errors->all() as $error)
       <li >{!! $error !!}</li>
       @endforeach
    </ul>
 </div>
 @endif
 @if(session()->has('success'))
 <div class="text-green  text-2xl text-center w-full mt-2"style="">
  <h1 > {{ session('success')}} </h2>
 </div>
 @endif
 @if(session()->has('err'))
 <div class="text-redtext-2xl text-center w-full mt-2"style="">
  <h1 > {{ session('err')}} </h2>
 </div>
 @endif
 
