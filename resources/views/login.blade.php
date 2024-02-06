<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="container p-5 bg-info">
<div class="container lg-w-50 mt-20 w-auto p-5 align-content-center bg-secondary">
    <div class="container  align-content-center p-2">
        <h1 class="text-white text-center">Enter Your Credentials</h1>
        <form class="form-group" action="{{url('login')}}" method="post">
            @csrf
            <div class="row mt-4">
                <div class="col h3 text-white">
                    <label for="email">Email</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" id="email" name="email" value="{{old('email')}}">
                    @error('email')
                    <h4 class="text-warning">{{$message}}</h4>
                    @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col h3 text-white">
                    <label for="password">Password</label>
                </div>
                <div class="col">
                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                    @error('password')
                    <h4 class="text-warning">{{$message}}</h4>
                    @enderror
                </div>
            </div>
            <div class="row mt-4">
                <input type="submit" value="Login" class="form-control btn btn-primary">
            </div>
        </form>
        <h1 class=" mt-4 text-center text-white">Don't Have An Account <a href="{{url('register')}}"  class="btn btn-warning">Register</a></h1>
    </div>
</div>
</body>
</html>
