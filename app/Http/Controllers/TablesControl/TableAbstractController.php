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


abstract class TableAbstractController extends Controller {
    private $valueToUpdate;
    private $info;

    protected function loadOrderInfo($order) {
        $this->loadOrder($order);
        $this->info = $this->info."<p> TOTAL -------R$: ".$this->valueToUpdate."</p>";

        return $this->info;
    }

    protected function loadOrderInfoWithCouvert($order, $couvertValue) {
        $this->loadOrder($order);

        $this->valueToUpdate = $this->valueToUpdate + $couvertValue;

        $this->info = $this->info."<p> -------COUVERT: ".$couvertValue."</p>";
        $this->info = $this->info."<p> TOTAL -------R$: ".$this->valueToUpdate."</p>";

        return $this->info;
    }

    private function loadOrder($order) {
        $this->valueToUpdate = $order->value;
        $this->info = "Lista de pedidos da mesa:";

        $listOfDrinks = OrderDrink::where('id_order', $order->id_order)->get();
        $listOfDishes = OrderDish::where('id_order', $order->id_order)->get();
        $listOfMenus  = OrderMenu::where('id_order', $order->id_order)->get();

        foreach ($listOfDrinks as $key=>$value) {
            $drink = Product::where('id_product', $value->id_drink_added)->first();
            $this->valueToUpdate = $this->valueToUpdate + $drink->value;

            $this->info = $this->info."<p> ".$drink->name." R$".$drink->value."</p>";
        }
        foreach ($listOfDishes as $key=>$value) {
            $dish = Dish::where('id_dish', $value->id_dish_added)->first();
            $this->valueToUpdate = $this->valueToUpdate + $dish->value;

            $this->info = $this->info."<p> ".$dish->name." R$".$dish->value."</p>";
        }
        foreach ($listOfMenus as $key=>$value) {
            $menu = Menu::where('id_menu', $value->id_menu_added)->first();
            $this->valueToUpdate = $this->valueToUpdate + 35;

            $this->info = $this->info."<p> "."Menu ".$menu->id_menu." R$ 35.0"."</p>";
        }
    }

}