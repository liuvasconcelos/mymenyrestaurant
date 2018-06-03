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


class AddItensController extends Controller
{

    public function index(){
        return view('tablescontrol\additem');
    }

    public function addItemDrink(Request $request, $idTable)
    {
        $quantitySelected = $request->quantity;

        $order = Order::where('table_number', $idTable)->first();
        $listOfUsers = User::select()->get();

        if($order==null) {
            Order::create(['table_number' => $idTable,
                'quantity_of_clients' => 1,
                'id_waiter' => 1,
                'value' => 0,
                'validation_code' => "0"]);
            $order = Order::where('table_number', $idTable)->first();

            Table::where('id_table', $idTable)->update(['status' => 1]);
        }

        for ($i = 1; $i <= $quantitySelected; $i++) {
            OrderDrink::create([ 'id_order' => $order->id_order,
                'id_drink_added' => $request->drink]);
        }

        $tableInformation = $this->loadTableInformation($order);

        return view('tablescontrol/tabledetail')->with(['idTable'=> $idTable, 'tableInformation'=> $tableInformation,
            'listOfUsers' => $listOfUsers]);

    }

    public function addItemDish(Request $request, $idTable)
    {
        $quantitySelected = $request->quantity;

        $order = Order::where('table_number', $idTable)->first();
        $listOfUsers = User::select()->get();

        if($order==null) {
            Order::create(['table_number' => $idTable,
                'quantity_of_clients' => 1,
                'id_waiter' => 1,
                'value' => 0,
                'validation_code' => "0"]);
            $order = Order::where('table_number', $idTable)->first();

            Table::where('id_table', $idTable)->update(['status' => 1]);
        }

        for ($i = 1; $i <= $quantitySelected; $i++) {
            OrderDish::create([ 'id_order' => $order->id_order,
                'id_dish_added' => $request->dish]);
        }

        $tableInformation = $this->loadTableInformation($order);

        return view('tablescontrol/tabledetail')->with(['idTable'=> $idTable, 'tableInformation'=> $tableInformation,
            'listOfUsers' => $listOfUsers]);

    }

    public function addItemMenu(Request $request, $idTable)
    {
        $quantitySelected = $request->quantity;

        $order = Order::where('table_number', $idTable)->first();
        $listOfUsers = User::select()->get();

        if($order==null) {
            Order::create(['table_number' => $idTable,
                'quantity_of_clients' => 1,
                'id_waiter' => 1,
                'value' => 0,
                'validation_code' => "0"]);
            $order = Order::where('table_number', $idTable)->first();

            Table::where('id_table', $idTable)->update(['status' => 1]);
        }

        for ($i = 1; $i <= $quantitySelected; $i++) {
            OrderMenu::create([ 'id_order' => $order->id_order,
                'id_menu_added' => $request->menu]);
        }

        $tableInformation = $this->loadTableInformation($order);

        return view('tablescontrol/tabledetail')->with(['idTable'=> $idTable, 'tableInformation'=> $tableInformation,
            'listOfUsers' => $listOfUsers]);

    }

    private function loadTableInformation($order) {

        $valueToUpdate = $order->value;
        $info = "Lista de pedidos da mesa:";


        $listOfDrinks = OrderDrink::where('id_order', $order->id_order)->get();
        $listOfDishes = OrderDish::where('id_order', $order->id_order)->get();
        $listOfMenus  = OrderMenu::where('id_order', $order->id_order)->get();


        foreach ($listOfDrinks as $key=>$value) {
            $drink = Product::where('id_product', $value->id_drink_added)->first();
            $valueToUpdate = $valueToUpdate + $drink->value;

            $info = $info."<p> ".$drink->name." R$".$drink->value."</p>";
        }
        foreach ($listOfDishes as $key=>$value) {
            $dish = Dish::where('id_dish', $value->id_dish_added)->first();
            $valueToUpdate = $valueToUpdate + $dish->value;

            $info = $info."<p> ".$dish->name." R$".$dish->value."</p>";
        }
        foreach ($listOfMenus as $key=>$value) {
            $menu = Menu::where('id_menu', $value->id_menu_added)->first();
            $valueToUpdate = $valueToUpdate + 35;

            $info = $info."<p> "."Menu ".$menu->id_menu." R$ 35.0"."</p>";
        }

        $info = $info."<p> TOTAL -------R$: ".$valueToUpdate."</p>";

        return $info;
    }

    public function addOrder()
    {
        return view('tablescontrol/tabledetail');
    }
}
