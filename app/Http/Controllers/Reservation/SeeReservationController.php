<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\TableStatusAbstractController;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeeReservationController extends TableStatusAbstractController
{

    public function index()
    {
        return view('reservation\seereservations');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function goBack()
    {
        return $this->updateTables();
    }

    public function cancelReservation($id)
    {
        Reservation::where('id_table', $id)->where('status', 1)->update(['status' => 0]);
        Table::where('id_table', $id)->update(['status' => 0]);

        return $this->updateTables();
    }
}
