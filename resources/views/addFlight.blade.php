@extends('home')

@section('admin')
    <li class="nav-item"><a href="{{url('newflight')}}" class="btn btn-success">Add Flights</a></li>
    <li class="nav-item"><a href="{{url('showbookings')}}" class="btn btn-success">All Bookings</a></li>
@endsection

@section('content')
    <div class="container lg-w-50 mt-20 w-auto p-5 align-content-center bg-secondary">
        <div class="container  align-content-center p-2">
            <h1 class="text-white text-center">Enter Flight Details</h1>
            <form class="form-group" action="{{url('createflight')}}" method="post">
                @csrf
                <div class="row mt-4">
                    <div class="col h3 text-white">
                        <label for="departure">Departure City</label>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" id="departure" name="departure" value="{{old('departure')}}">
                        @error('departure')
                        <h3 class="text-warning">{{$message}}</h3>
                        @enderror
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col h3 text-white">
                        <label for="departure_date">Departure Date</label>
                    </div>
                    <div class="col">
                        <input class="form-control" type="datetime-local" id="departure_date" name="departure_date" value="{{old('departure_date')}}">
                        @error('departure_date')
                        <h3 class="text-warning">{{$message}}</h3>
                        @enderror
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col h3 text-white">
                        <label for="destination">Destination City</label>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" id="destination" name="destination" value="{{old('destination')}}">
                        @error('destination')
                        <h3 class="text-warning">{{$message}}</h3>
                        @enderror
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col h3 text-white">
                        <label for="destination_date">Destination Date</label>
                    </div>
                    <div class="col">
                        <input class="form-control" type="datetime-local" id="destination_date" name="destination_date" value="{{old('destination_date')}}">
                        @error('destination_date')
                        <h3 class="text-warning">{{$message}}</h3>
                        @enderror
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col h3 text-white">
                        <label for="cost">Price</label>
                    </div>
                    <div class="col">
                        <input class="form-control" type="number" id="cost" name="cost" value="{{old('cost')}}">
                        @error('cost')
                        <h3 class="text-warning">{{$message}}</h3>
                        @enderror
                    </div>
                </div>
                <div class="row mt-4">
                    <input type="submit" value="create" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
