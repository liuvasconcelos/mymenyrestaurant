<?php

namespace App\Http\Controllers\Reservation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeeReservationController extends Controller
{

    public function index()
    {
        return view('reservation\seereservations');
    }

    public function goBack()
    {
        return view('home');
    }
}
