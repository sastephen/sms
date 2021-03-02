<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();

        return view('welcome', compact('stocks'));
    }

    public function item(Request $request)
    {

        $item = Stock::find($request->id);
        
        return view('item', compact('item'));
    }
}
