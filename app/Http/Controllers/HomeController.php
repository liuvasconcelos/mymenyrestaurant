<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDish;
use App\Models\OrderDrink;
use App\Models\OrderMenu;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\Table;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $freeTableStatus     = 'btn green-haze ml-5';
    private $fullTableStatus     = 'btn red-mint ml-5';
    private $reservedTableStatus = 'btn yellow-mint ml-5';

    private $tableStatus1;
    private $tableStatus2;
    private $tableStatus3;
    private $tableStatus4;
    private $tableStatus5;
    private $tableStatus6;
    private $tableStatus7;
    private $tableStatus8;
    private $tableStatus9;
    private $tableStatus10;
    private $tableStatus11;

    public function index()
    {
        $tables = Table::select()->first();

        if($tables == null) {
            for ($i = 1; $i <= 11; $i++){
                Table::create([ 'status' => 0]);
            }
        }

        $tablesMap = array ($this->tableStatus1, $this->tableStatus2, $this->tableStatus3, $this->tableStatus4,
                                    $this->tableStatus5, $this->tableStatus6, $this->tableStatus7, $this->tableStatus8,
                                    $this->tableStatus9, $this->tableStatus10, $this->tableStatus11);

        $tablesMap = $this->lookForTablesStatus($tablesMap);

        return view('home')->with(['tableStatus1'=>$tablesMap[0],
                                         'tableStatus2'=>$tablesMap[1],
                                         'tableStatus3'=>$tablesMap[2],
                                         'tableStatus4'=>$tablesMap[3],
                                         'tableStatus5'=>$tablesMap[4],
                                         'tableStatus6'=>$tablesMap[5],
                                         'tableStatus7'=>$tablesMap[6],
                                         'tableStatus8'=>$tablesMap[7],
                                         'tableStatus9'=>$tablesMap[8],
                                         'tableStatus10'=>$tablesMap[9],
                                         'tableStatus11'=>$tablesMap[10],
                                         ]);
    }

    private function lookForTablesStatus($tablesMap){
        foreach ($tablesMap as $key=>$value) {
            $table =  Table::where('id_table', $key+1)->first();
            $status = $table->status;

            if($status == 0) {
                $tablesMap[$key] = $this->freeTableStatus;
            } else if($status == 1) {
                $tablesMap[$key] = $this->fullTableStatus;
            } else if($status == 2) {
                $tablesMap[$key] = $this->reservedTableStatus;
            }
        }
        return $tablesMap;
    }

    public function makeReservation()
    {
        $availableTable = Table::where('status', 0)->get();
        return view('reservation/makeareservation')->with(['listOfAvailableTable'=> $availableTable]);
    }

    public function seeReservation()
    {
        return view('reservation/seereservations');
    }

    public function tableDetail($id)
    {
        $table = Table::where('id_table', $id)->first();
        $listOfUsers = User::select()->get();

        if($table->status == 2) {
            $reserveInformation = $this->loadReserveInformation($id);
            return view('reservation/seereservations')->with(['idTable'=> $id, 'tableInformation'=> $reserveInformation]);
        } else if($table->status == 1){
            $tableInformation = $this->loadTableInformation($id);
            return view('tablescontrol/tabledetail')->with(['idTable'=> $id, 'tableInformation'=> $tableInformation,
                'listOfUsers' => $listOfUsers]);
        } else {
            return view('tablescontrol/tabledetail')->with(['idTable'=> $id, 'tableInformation'=> "",
                'listOfUsers' => $listOfUsers]);
        }

    }

    private function loadReserveInformation($idTable) {
        $reservation = Reservation::where('id_table', $idTable)->where('status', 1)->first();
        $info = 'DETALHES DA RESERVA: ';

        $info = $info."Nome do Cliente: ".$reservation->cliente_name." ".
            "Telefone: ".$reservation->client_phone." ".
            "Quantidade de pessoas: ".$reservation->quantity_of_clients." ".
            "Hora da reserva: ".$reservation->reservation_time." ".
            "---- Reservado às: ".$reservation->created_at;
        
        return $info;
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
