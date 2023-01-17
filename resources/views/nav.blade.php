<head>
    <link href="/css/main.css" rel="stylesheet"/>
</head>
<center>

<div>
    <img src="/images/logo.jpg"/>
</div>
    <br/>
   

<a href = "{{ route('home')}}" >Home</a> - 

@if(Auth::guard('web')->user())
<a href="{{ route('dashboard')}}">Dashboard</a> - 
<a href="{{ route('logout')}}">Logout</a>
@endif

@if(!Auth::guard('web')->user())
<a href="{{ route('login')}}">Login</a> - 
<a href="{{ route('registration')}}">Registration</a> - 
@endif
<br/>
    
</center>
