@include('nav')
<center>
<h1> Login  </h1>
<h2>Login Failed</h2>
<h2>Invalid username or password, please try again</h2>
<form action="{{ route('login_submit') }}" method="post">
    @csrf
<div>Email Address: </div>
<div>
    <input type="text" name="email">
</div>
<div>Password: </div>
<div>
    <input type="password" name="password">
</div>
<div style="margin-top:10px;">
    <input type="submit" value="Login">
</div>
</form>
<center>