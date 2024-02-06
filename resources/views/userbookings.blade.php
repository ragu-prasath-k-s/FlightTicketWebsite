@extends('home')

@section('content')
    <div class="container p-2">
        <table class="table  table-responsive table-bordered">
            <thead class="table-info">
            <tr>
                <th>Flight id</th>
                <th>Name</th>
                <th>Departure</th>
                <th>Departure Date and Time</th>
                <th>Destination</th>
                <th>Destination Date and Time</th>
                <th>Price</th>
                <th>Count</th>
                <th>Total</th>
                <th>Booked At</th>
            </tr>
            </thead>
            <tbody class="table-primary">
            @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->flight->id }}</td>
                        <td>{{ $booking->flight->airline->name }}</td>
                        <td>{{ $booking->flight->departure}}</td>
                        <td>{{ $booking->flight->departure_date_time}}</td>
                        <td>{{ $booking->flight->destination}}</td>
                        <td>{{ $booking->flight->destination_date_time}}</td>
                        <td>{{ $booking->flight->cost}}</td>
                        <td>{{$booking->no_of_tickets}}</td>
                        <td>{{$booking->price}}</td>
                        <td>{{$booking->created_at}}</td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
