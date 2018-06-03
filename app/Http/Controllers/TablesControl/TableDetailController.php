<?php

namespace App\Http\Controllers\TablesControl;

use App\Models\Dish;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDish;
use App\Models\OrderDrink;
use App\Models\OrderMenu;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableDetailController extends Controller
{
    public function index()
    {
        return view('tablescontrol\tabledetail');
    }

    public function addItemDrink($id)
    {
        $this->registerItens();
        $drinks = Product::where('type', 'bebida')->get();

        return view('tablescontrol/additemdrink')->with(['listOfDrinks'=> $drinks, 'idTable'=>$id]);
    }

    public function addItemDish($id)
    {
        $this->registerItens();
        $dishes = Dish::where('status', 1)->get();

        return view('tablescontrol/additemdish')->with(['listOfDishes'=> $dishes, 'idTable'=>$id]);
    }

    public function addItemMenu($id)
    {
        $this->registerItens();
        $menus  = Menu::where('status', 1)->get();

        return view('tablescontrol/additemmenu')->with(['listOfMenus'=> $menus, 'idTable'=>$id]);
    }

    public function finalizeTable(Request $request, $idTable)
    {
        Order::where('table_number', $idTable)->update(['id_waiter' => $request->waiter,
            'quantity_of_clients' => $request->quantity]);

        $info = $this->loadTableInformation($idTable);

        return view('tablescontrol/finalizetable')->with(['tableId'=> $idTable, 'info' => $info]);
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

        $info = $info."<p>TOTAL -------R$: ".$valueToUpdate."</p>";

        return $info;
    }

    private function registerItens(){
        $product = Product::select()->first();

        if($product == null) {
            Product::create([ 'type' => 'bebida',
                'name'=> 'Coca-cola',
                'value' => 5,
                'status' => 1]);
            Product::create([ 'type' => 'bebida',
                'name'=> 'Fanta',
                'value' => 5,
                'status' => 1]);
            Product::create([ 'type' => 'bebida',
                'name'=> 'Guaraná',
                'value' => 5,
                'status' => 1]);
            Dish::create(['name' => 'Picanha na chapa',
                'value' => 40,
                'description'=> 'Picanha grelhada na chapa com cebolas.',
                'status' => 1]);
            Dish::create(['name' => 'Macarronada da casa',
                'value' => 30,
                'description'=> 'Macarrona a bolonhesa',
                'status' => 1]);
            Dish::create(['name' => 'Omelete',
                'value' => 10,
                'description'=> 'Omelete cremoso.',
                'status' => 1]);
            Dish::create(['name' => 'Salada verde',
                'value' => 12,
                'description'=> 'Salada de rúcula com queijo',
                'status' => 1]);
            Dish::create(['name' => 'Mousse de limão',
                'value' => 8,
                'description'=> 'Mousse cremoso de limão',
                'status' => 1]);
            Dish::create(['name' => 'Mousse de chocolate',
                'value' => 9,
                'description'=> 'Mousse de chocolate',
                'status' => 1]);
            Menu::create(['id_starter' => 3,
                'id_main_course' => 2,
                'id_dessert' => 6,
                'status' => 1]);
            Menu::create(['id_starter' => 4,
                'id_main_course' => 1,
                'id_dessert' => 5,
                'status' => 1]);
        }

    }
}
