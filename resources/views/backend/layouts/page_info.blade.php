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
 <div class="text-green-500  text-2xl text-center w-full mt-2"style="">
  <h1 > {{ session('success')}} </h2>
 </div>
 @endif

 
