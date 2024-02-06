<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="container p-5 mb-0">
        <ul class="nav nav-justified">
            <li class="nav-item"><a href="{{url('logout')}}" class="btn btn-success">Logout</a></li>
            <li class="nav-item"><a href="{{url('userbookings')}}" class="btn btn-success">Your Bookings</a></li>
            <li class="nav-item"><a href="{{url('flights')}}" class="btn btn-success">All Flights</a></li>
            @yield('admin')
            @yield('user')
        </ul>
    </div>
</div>
<div class="container p-2">
    @yield('content')
</div>
</body>
</html>
