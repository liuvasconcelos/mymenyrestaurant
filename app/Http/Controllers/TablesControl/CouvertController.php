<?php

namespace App\Http\Controllers\TablesControl;

use App\Models\Couvert;
use App\Models\Dish;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDish;
use App\Models\OrderDrink;
use App\Models\OrderMenu;
use App\Models\Product;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouvertController extends TableAbstractController
{
    public function addCouvert($idTable)
    {
        $order = Order::where('table_number', $idTable)->first();
        $couvertValue = ($order->quantity_of_clients * 6);

        Couvert::create([ 'id_table' => $idTable,
            'value' => $couvertValue,
            'status' => 1]);

        $info = $this->loadOrderInfoWithCouvert($order, $couvertValue);

        return view('tablescontrol/finalizetable')->with(['tableId'=> $idTable, 'info' => $info]);
    }


}
