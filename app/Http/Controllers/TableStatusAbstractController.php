<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class TableStatusAbstractController extends Controller
{
    protected $freeTableStatus     = 'btn green-haze ml-5';
    protected $fullTableStatus     = 'btn red-mint ml-5';
    protected $reservedTableStatus = 'btn yellow-mint ml-5';

    protected $tableStatus1;
    protected $tableStatus2;
    protected $tableStatus3;
    protected $tableStatus4;
    protected $tableStatus5;
    protected $tableStatus6;
    protected $tableStatus7;
    protected $tableStatus8;
    protected $tableStatus9;
    protected $tableStatus10;
    protected $tableStatus11;

    public function updateTables() {
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

    protected function lookForTablesStatus($tablesMap){
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
}