<?php

namespace App\Http\Controllers\Reservation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationRegisterController extends Controller
{
    public function index()
    {
        return view('reservation\makeareservation');
    }

    public function reserveTable()
    {
        return view('home');
    }
}
