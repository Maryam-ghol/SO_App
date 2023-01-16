@include('nav')
<center>
<h1>Welcome to Dashboard</h1>
<p>Welcome to dashboard {{Auth::guard('web')->user()->name}}</p>
</center>
