<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function makeReservation()
    {
        return view('reservation/makeareservation');
    }

    public function seeReservation()
    {
        return view('reservation/seereservations');
    }

    public function finalizeTable()
    {
        return view('tablescontrol/finalizetable');
    }

    public function tableDetail()
    {
        return view('tablescontrol/tabledetail');
    }

}
