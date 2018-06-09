<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\TableStatusAbstractController;
use App\Models\Reservation;
use App\Models\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationRegisterController extends TableStatusAbstractController
{
    public function index()
    {
        return view('reservation\makeareservation');
    }

    public function reserveTable(Request $request)
    {
//        $this->validate($request, [
//            'clientName' => 'required',
//            'celPhone' => 'required|max:11|min:10|integer',
//            'hour' => 'required|integer',
//        ]);
        Reservation::create(['id_table' => $request->table,
            'client_name' => $request->clientName,
            'client_phone' => $request->celPhone,
            'quantity_of_clients' => $request->quantity,
            'reservation_time' => $request->hour,
            'status' => 1]);

        Table::where('id_table', $request->table)->update(['status' => 2]);

        return $this->updateTables();
    }

}
