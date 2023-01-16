@include('nav')
<center>
<h1>Welcome to Dashboard</h1>

<p>Welcome to dashboard </p>
<p>The email of the current user is as below</p>
{{ session()->get('query') }}
</center>

