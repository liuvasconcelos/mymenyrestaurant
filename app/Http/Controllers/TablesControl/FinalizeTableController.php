<?php

namespace App\Http\Controllers\TablesControl;

use App\Http\Controllers\TableStatusAbstractController;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinalizeTableController extends TableStatusAbstractController
{
    public function index()
    {
        return view('tablescontrol\finalizetable');
    }

    public function addCouvert($idTable)
    {
        return view('tablescontrol/addcouvert')->with(['tableId'=> $idTable]);
    }

    public function discountCoupon()
    {
        dd("Função de cupom de desconto ainda não disponível.");
        return view('home');
    }

    public function finishAccount($tableId)
    {
        Table::where('id_table', $tableId)->update(['status' => 0]);
        return $this->updateTables();
    }

}
