<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = "customer";
        $user->save();
        Auth::login($user);
        return redirect('flights');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Auth::login($user);
            if($user->role="admin"){
                return redirect('admin');
            }else
            return redirect('flights');
        }
    }

    public function bookTicket(Request $request,Flight $flight)
    {
        $request->validate([
            'count'=>'required|integer|min:1|max:60',
        ]);
        if($flight->available_seats<$request->count){
            return back()->with('msg','Enter ticket count according to availability');
        }
        if($flight->departure_date_time<now()){
            return back()->with('msg','Flight already depatured please choose another flight');
        }
        $userid = Auth::user()->id;
        $booking = new booking();
        $booking->user_id=$userid;
        $booking->flight_id=$flight->id;
        $booking->no_of_tickets=$request->count;
        $booking->price=$request->count*$flight->cost;
        $booking->save();

        $flight->available_seats = $flight->available_seats-$request->count;
        $flight->save();
        return redirect()->back()->with('msg','Booking Successful');
    }

    public function createflight(Request $request)
    {
        $request->validate([
            'departure' => 'required|min:2|max:100',
            'departure_date' => 'required',
            'destination' => 'required|min:2|max:100',
            'destination_date' => 'required',
            'cost' => 'required',
        ]);
        $flight = new Flight();
        $flight->airline_id = 1;
        $flight->departure = $request->departure;
        $flight->departure_date_time = $request->departure_date;
        $flight->destination = $request->destination;
        $flight->destination_date_time = $request->destination_date;
        $flight->cost = $request->cost;
        $flight->save();
        return redirect('admin');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $flights = Flight::where('departure_date_time','>',now())
            ->where('departure', 'like', "%$query%")
            ->orWhere('destination', 'like', "%$query%")
            ->orWhere('departure_date_time', 'like', "%$query%")
            ->orWhere('destination_date_time', 'like', "%$query%")
            ->get();

        return view('flights', compact('flights'));
    }

    public function adminsearch(Request $request)
    {
        $query = $request->input('query');
        $bookings=Booking::with('flight')->where('flight_id',$query)->get();
        return view('showbookings', compact('bookings'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }
}
