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

    public function goBack()
    {
        return view('home');
    }
}
