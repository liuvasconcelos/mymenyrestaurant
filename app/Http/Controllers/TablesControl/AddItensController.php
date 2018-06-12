<?php

namespace App\Http\Controllers\TablesControl;

use App\Models\Dish;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDish;
use App\Models\OrderDrink;
use App\Models\OrderMenu;
use App\Models\Product;
use App\Models\Table;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AddItensController extends TableAbstractController
{
    private $order;
    private $quantitySelected;

    public function index(){
        return view('tablescontrol\additem');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addProductToOrder(Request $request, $idTable)
    {
        $this->quantitySelected = $request->quantity;

        $this->order = Order::where('table_number', $idTable)->first();
        $listOfUsers = User::select()->get();

        if($this->order==null) {
            Order::create(['table_number' => $idTable,
                'quantity_of_clients' => 1,
                'id_waiter' => 1,
                'value' => 0,
                'validation_code' => "0"]);
            $this->order = Order::where('table_number', $idTable)->first();

            Table::where('id_table', $idTable)->update(['status' => 1]);
        }

        $this->addItem($request);

        $tableInformation = $this->loadOrderInfo($this->order);

        return view('tablescontrol/tabledetail')->with(['idTable'=> $idTable, 'tableInformation'=> $tableInformation,
            'listOfUsers' => $listOfUsers]);

    }

    private function addItem($request) {

        if($request->drink != null) {
            for ($i = 1; $i <= $this->quantitySelected; $i++) {
                OrderDrink::create([ 'id_order' => $this->order->id_order,
                    'id_drink_added' => $request->drink]);
            }
        }else if($request->dish != null) {
            for ($i = 1; $i <= $this->quantitySelected; $i++) {
            OrderDish::create([ 'id_order' => $this->order->id_order,
                'id_dish_added' => $request->dish]);
        }
        }else if($request->menu != null) {
            for ($i = 1; $i <= $this->quantitySelected; $i++) {
            OrderMenu::create([ 'id_order' => $this->order->id_order,
                'id_menu_added' => $request->menu]);
        }
        }
    }

    public function addOrder()
    {
        return view('tablescontrol/tabledetail');
    }
}
