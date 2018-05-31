<?php

namespace App\Http\Controllers\TablesControl;

use App\Models\Product;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AddItensController extends Controller
{
    public function index(){
        return view('tablescontrol\additem');
    }

    public function addItem(Request $request, $id)
    {
        $quantitySelected = $request->quantity;
        $itemSelected = $request->drink;
        $drinkModel = Product::where('id_product', $itemSelected)->first();
        $valueOfDrink = ($drinkModel->value)*($quantitySelected);


        $tableInformation = $this->loadTableInformation($id);

        return view('tablescontrol/tabledetail')->with(['idTable'=> $id, 'tableInformation'=> $tableInformation]);

    }

    private function loadTableInformation($id) {
        $table =  Table::where('id_table', $id)->first();
        $status = $table->status;

        $info = "Lista de pedidos da mesa:";

        return $info;
    }

    public function addOrder()
    {
        return view('tablescontrol/tabledetail');
    }
}
