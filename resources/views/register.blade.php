<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="container p-5 bg-info">
<div class="container lg-w-50 mt-20 w-auto p-5 align-content-center bg-secondary">
    <div class="container  align-content-center p-2">
        <h1 class="text-white text-center">Enter Your Details</h1>
        <form class="form-group" action="{{url('register')}}" method="post">
            @csrf
            <div class="row mt-4">
                <div class="col h3 text-white">
                    <label for="name">User Name</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}">
                    @error('name')
                    <h3 class="text-warning">{{$message}}</h3>
                    @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col h3 text-white">
                    <label for="email">Email</label>
                </div>
                <div class="col">
                    <input class="form-control" type="email" id="email" name="email" value="{{old('email')}}">
                    @error('email')
                    <h3 class="text-warning">{{$message}}</h3>
                    @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col h3 text-white">
                    <label for="password">Password</label>
                </div>
                <div class="col">
                    <input type="password" class="form-control" id="password" name="password" value="{{old("password")}}">
                    @error('password')
                    <h3 class="text-warning">{{$message}}</h3>
                    @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col h3 text-white">
                    <label for="password_confirmation">Confirm Password</label>
                </div>
                <div class="col">
                    <input type = "password" id = "password_confirmation" name = "password_confirmation" class="form-control" >
                </div>
            </div>
            <div class="row mt-4">
                <input type="submit" value="Register" class="form-control btn btn-primary">
            </div>
        </form>
        <h1 class=" mt-4 text-center text-white">Already Have An Account <a class="btn btn-warning" href="{{url('login')}}">Login</a></h1>
    </div>
</div>
</body>
</html>
