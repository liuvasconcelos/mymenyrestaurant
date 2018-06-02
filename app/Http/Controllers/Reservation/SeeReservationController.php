<?php

namespace App\Http\Controllers\Reservation;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeeReservationController extends Controller
{

    public function index()
    {
        return view('reservation\seereservations');
    }

    private $freeTableStatus     = 'btn green-haze ml-5';
    private $fullTableStatus     = 'btn red-mint ml-5';
    private $reservedTableStatus = 'btn yellow-mint ml-5';

    private $tableStatus1;
    private $tableStatus2;
    private $tableStatus3;
    private $tableStatus4;
    private $tableStatus5;
    private $tableStatus6;
    private $tableStatus7;
    private $tableStatus8;
    private $tableStatus9;
    private $tableStatus10;
    private $tableStatus11;

    public function goBack()
    {
        $tablesMap = array ($this->tableStatus1, $this->tableStatus2, $this->tableStatus3, $this->tableStatus4,
            $this->tableStatus5, $this->tableStatus6, $this->tableStatus7, $this->tableStatus8,
            $this->tableStatus9, $this->tableStatus10, $this->tableStatus11);

        $tablesMap = $this->lookForTablesStatus($tablesMap);

        return view('home')->with(['tableStatus1'=>$tablesMap[0],
            'tableStatus2'=>$tablesMap[1],
            'tableStatus3'=>$tablesMap[2],
            'tableStatus4'=>$tablesMap[3],
            'tableStatus5'=>$tablesMap[4],
            'tableStatus6'=>$tablesMap[5],
            'tableStatus7'=>$tablesMap[6],
            'tableStatus8'=>$tablesMap[7],
            'tableStatus9'=>$tablesMap[8],
            'tableStatus10'=>$tablesMap[9],
            'tableStatus11'=>$tablesMap[10],
        ]);
    }

    private function lookForTablesStatus($tablesMap){
        foreach ($tablesMap as $key=>$value) {
            $table =  Table::where('id_table', $key+1)->first();
            $status = $table->status;

            if($status == 0) {
                $tablesMap[$key] = $this->freeTableStatus;
            } else if($status == 1) {
                $tablesMap[$key] = $this->fullTableStatus;
            } else if($status == 2) {
                $tablesMap[$key] = $this->reservedTableStatus;
            }
        }
        return $tablesMap;
    }

    public function cancelReservation($id)
    {
        Reservation::where('id_table', $id)->where('status', 1)->update(['status' => 0]);
        Table::where('id_table', $id)->update(['status' => 0]);

        $tablesMap = array ($this->tableStatus1, $this->tableStatus2, $this->tableStatus3, $this->tableStatus4,
            $this->tableStatus5, $this->tableStatus6, $this->tableStatus7, $this->tableStatus8,
            $this->tableStatus9, $this->tableStatus10, $this->tableStatus11);

        $tablesMap = $this->lookForTablesStatus($tablesMap);

        return view('home')->with(['tableStatus1'=>$tablesMap[0],
            'tableStatus2'=>$tablesMap[1],
            'tableStatus3'=>$tablesMap[2],
            'tableStatus4'=>$tablesMap[3],
            'tableStatus5'=>$tablesMap[4],
            'tableStatus6'=>$tablesMap[5],
            'tableStatus7'=>$tablesMap[6],
            'tableStatus8'=>$tablesMap[7],
            'tableStatus9'=>$tablesMap[8],
            'tableStatus10'=>$tablesMap[9],
            'tableStatus11'=>$tablesMap[10],
        ]);
    }
}
