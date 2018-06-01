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

    public function addCouvert()
    {
      dd("adicionar couvert  a conta");
        return view('home');
    }

    public function discountCoupon()
    {
        dd("cupom de desconto");
        return view('home');
    }

    public function finishAccount()
    {
        dd("finalizar e imprimir");
        return view('home');
    }

    private function loadTableInformation($id) {

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

        $info = $info." -------R$: ".$valueToUpdate;

        return $info;
    }
}
