<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Flight;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('login',function (){
    return view('login');
})->name('login');

Route::get('register',function (){
    return view('register');
})->name('register');

Route::post('register',[UserController::class,'register']);

Route::post('login',[UserController::class,'login']);

Route::get('logout',[UserController::class,'logout'])->name('logout')->middleware('auth');

Route::get('flights',function (){
    $flights = Flight::with( 'airline')->where('departure_date_time','>',now())->where('available_seats','>',0)->get();
    return view('flights', compact('flights'));
})->name('flights')->middleware('auth');

Route::get('admin',function (){
    $flights = Flight::with( 'airline')->get();
    return view('admin', compact('flights'));
})->name('admin')->middleware('auth');

Route::post('book/{flight}', [UserController::class,'bookTicket'])->name('book');

Route::get('showbookings',function (){
    $bookings = Booking::with( 'flight')->get();
    return view('showbookings', compact('bookings'));
})->name('showbookings')->middleware('auth');

Route::get('userbookings',function (){
    $bookings = Booking::with( 'flight')->where('user_id',Auth::user()->id)->get();
    return view('userbookings', compact('bookings'));
})->name('userbookings')->middleware('auth');

Route::get('newflight',function (){
    return view('addFlight');
});

Route::post('createflight',[UserController::class,'createflight'])->name('createflight');

Route::get('flightsearch',[UserController::class,'search'])->name('flightsearch');

Route::get('adminsearch',[UserController::class,'adminsearch'])->name('adminsearch');
