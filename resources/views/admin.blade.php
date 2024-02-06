@extends('flights')

@section('admin')
    <li class="nav-item"><a href="{{url('newflight')}}" class="btn btn-success">Add Flights</a></li>
    <li class="nav-item"><a href="{{url('showbookings')}}" class="btn btn-success">All Bookings</a></li>
@endsection
