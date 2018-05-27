<?php

namespace App\Http\Controllers\TablesControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AddItensController extends Controller
{
    public $productsAdded;
    public function index(){
        return view('tablescontrol\additem');
    }

    private  $tiago;
    public function __construct(TableDetailController $tableDetailController)
    {
        $this->tiago = $tableDetailController;
    }

    public function addItem(Request $request)
    {
       // dd($request->all());
        $quantitySelected = $request->quantity;
        $itemSelected = $request->itemSelected;

        $teste = [$this->tiago->productsAdded.$itemSelected." ".$quantitySelected];

       return redirect()->back()->withErrors($teste);

//        return redirect()->with(['productsAdded'=> $productsAdded]);
    }

    public function addOrder()
    {
        return view('tablescontrol/tabledetail');
    }
}
