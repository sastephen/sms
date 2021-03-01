<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sku;
use App\Models\Stock;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalStocks = Stock::count('id');
        $totalStockPrice = Stock::sum('price');
        $totalCategory = Category::count('name');

        $latestSKU = Sku::latest()->limit(8)->get();
        $latestStocks = Stock::latest()->limit(8)->get();
        $latestCategories = Category::latest()->limit(8)->get();
        return view('home',compact('totalStocks', 'latestSKU','totalStockPrice', 'totalCategory', 'latestStocks','latestCategories'));
    }
}
