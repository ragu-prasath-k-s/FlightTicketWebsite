@extends('home')
@section('user')
    <form action="{{ url('flightsearch') }}" method="GET">
        <input type="text" class="form-control" name="query" placeholder="Search for flights">
        <input type="submit" class="form-control" value="Search">
    </form>
@endsection
@section('content')
    @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <div class="container p-2">
        <table class="table  table-responsive table-bordered">
            <thead class="table-info">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Departure</th>
                <th>Departure Date and Time</th>
                <th>Destination</th>
                <th>Destination Date and Time</th>
                <th>Price</th>
                <th>Available Seats</th>
                <th>Book A Flight</th>
            </tr>
            </thead>
            <tbody class="table-primary">
            @foreach($flights as $flight)
                <tr>
                    <td>{{ $flight->id }}</td>
                    <td>{{ $flight->airline->name }}</td>
                    <td>{{ $flight->departure}}</td>
                    <td>{{ $flight->departure_date_time}}</td>
                    <td>{{ $flight->destination}}</td>
                    <td>{{ $flight->destination_date_time}}</td>
                    <td>{{ $flight->cost}}</td>
                    <td>{{ $flight->available_seats}}</td>
                    <td>
                        <form action="{{url('book',$flight)}}" method="post">
                            @csrf
                            <label>count</label>
                            <input type="integer" name="count" class="form-control">
                            @error('count')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <button class="btn-success" type="submit">Book</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
