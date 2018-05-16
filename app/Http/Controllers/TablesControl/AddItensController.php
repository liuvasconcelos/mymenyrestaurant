<?php

namespace App\Http\Controllers\TablesControl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddItensController extends Controller
{
    public function index()
    {
        return view('tablescontrol\additem');
    }

    public function addItem()
    {
        return view('tablescontrol/tabledetail');
    }
}
