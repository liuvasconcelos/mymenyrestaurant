<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\TableStatusAbstractController;
use App\Models\Reservation;
use App\Models\Table;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class ReservationRegisterController extends TableStatusAbstractController
{
    public function index()
    {
        return view('reservation\makeareservation');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reserveTable(Request $request)
    {

        Reservation::create(['id_table' => $request->table,
            'client_name' => $request->clientName,
            'client_phone' => $request->celPhone,
            'quantity_of_clients' => $request->quantity,
            'reservation_time' => $request->hour,
            'status' => 1]);

        Table::where('id_table', $request->table)->update(['status' => 2]);

        return $this->updateTables();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'clientName' => 'required',
            'celPhone' => 'required',
            'hour' => 'required',
        ]);
    }

}
