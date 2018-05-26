<?php

namespace App\Http\Controllers\TablesControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableDetailController extends Controller
{

    public function index()
    {
        $this->loadTableInformation();
        return view('tablescontrol\tabledetail');
    }

    public function addItem()
    {
        return view('tablescontrol/additem');
    }
}
