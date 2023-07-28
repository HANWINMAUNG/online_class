@if($errors->any())
 <div class="text-red-500">
    <ul>
       @foreach($errors->all() as $error)
       <li>{!! $error !!}</li>
       @endforeach
    </ul>
 </div>
 @endif


 @if(session()->has('success'))
 <div class="text-green-500 w-full bg-green-400">
   {{ session('success')}} 
 </div>
 @endif

 
