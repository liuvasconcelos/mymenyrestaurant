<?php

namespace App\Http\Controllers\TablesControl;

use App\Models\Dish;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableDetailController extends Controller
{
    public $productsAdded;
    public function index()
    {
        return view('tablescontrol\tabledetail');
    }

    public function addItem()
    {
        $drinks = Product::where('type', 'bebida')->get();
        $dishes = Dish::where('status', 1)->get();
        $menus  = Menu::where('status', 1)->get();


        return view('tablescontrol/additem')->with(['listOfDrinks'=> $drinks, 'listOfDishes'=> $dishes,
            'listOfMenus'=> $menus, 'productsAdded'=>$this->productsAdded]);
    }

    public function finalizeTable()
    {
        return view('tablescontrol/finalizetable');
    }
}
