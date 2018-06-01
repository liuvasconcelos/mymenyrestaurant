<?php

namespace App\Http\Controllers\TablesControl;

use App\Models\Dish;
use App\Models\Menu;
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
        $drinks = Product::where('type', 'bebida')->get();

        return view('tablescontrol/additemdrink')->with(['listOfDrinks'=> $drinks, 'idTable'=>$id]);
    }

    public function addItemDish($id)
    {
        $dishes = Dish::where('status', 1)->get();

        return view('tablescontrol/additemdish')->with(['listOfDishes'=> $dishes, 'idTable'=>$id]);
    }

    public function addItemMenu($id)
    {
        $menus  = Menu::where('status', 1)->get();

        return view('tablescontrol/additemmenu')->with(['listOfMenus'=> $menus, 'idTable'=>$id]);
    }

    public function finalizeTable($idTable, $TableInfo)
    {
        return view('tablescontrol/finalizetable')->with(['tableId'=> $idTable, 'tableInfo'=>$TableInfo]);
    }
}
