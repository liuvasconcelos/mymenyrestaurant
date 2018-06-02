<?php

namespace App\Http\Controllers\TablesControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinalizeTableController extends Controller
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

    public function finishAccount($info)
    {
        dd($info);
        return view('home');
    }

}
