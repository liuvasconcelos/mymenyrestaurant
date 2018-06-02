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

class CouvertController extends Controller
{
    public function addCouvert($idTable)
    {
        $order = Order::where('table_number', $idTable)->first();
        $couvertValue = ($order->quantity_of_clients * 6);

        Couvert::create([ 'id_table' => $idTable,
            'value' => $couvertValue,
            'status' => 1]);

        $info = $this->loadTableInformation($idTable, $couvertValue);

        return view('tablescontrol/finalizetable')->with(['tableId'=> $idTable, 'info' => $info]);
    }

    private function loadTableInformation($id, $couvertValue) {
        $order = Order::where('table_number', $id)->first();
        $valueToUpdate = $order->value;
        $info = "Lista de pedidos da mesa:";


        $listOfDrinks = OrderDrink::where('id_order', $order->id_order)->get();
        $listOfDishes = OrderDish::where('id_order', $order->id_order)->get();
        $listOfMenus  = OrderMenu::where('id_order', $order->id_order)->get();


        foreach ($listOfDrinks as $key=>$value) {
            $drink = Product::where('id_product', $value->id_drink_added)->first();
            $valueToUpdate = $valueToUpdate + $drink->value;

            $info = $info." ".$drink->name." R$".$drink->value;
        }
        foreach ($listOfDishes as $key=>$value) {
            $dish = Dish::where('id_dish', $value->id_dish_added)->first();
            $valueToUpdate = $valueToUpdate + $dish->value;

            $info = $info." ".$dish->name." R$".$dish->value;
        }
        foreach ($listOfMenus as $key=>$value) {
            $menu = Menu::where('id_menu', $value->id_menu_added)->first();
            $valueToUpdate = $valueToUpdate + 35;

            $info = $info." "."Menu ".$menu->id_menu." R$ 35.0";
        }

        $valueToUpdate = $valueToUpdate + $couvertValue;

        $info = $info." -------COUVERT: ".$couvertValue;
        $info = $info." -------R$: ".$valueToUpdate;

        return $info;
    }
}
