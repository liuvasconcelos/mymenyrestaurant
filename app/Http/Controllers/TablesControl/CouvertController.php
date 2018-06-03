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

        $valueToUpdate = $valueToUpdate + $couvertValue;

        $info = $info."<p> -------COUVERT: ".$couvertValue."</p>";
        $info = $info."<p> TOTAL -------R$: ".$valueToUpdate."</p>";

        return $info;
    }
}
