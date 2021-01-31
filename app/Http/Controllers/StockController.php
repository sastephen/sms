<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockRequest;
use App\Models\Category;
use App\Models\Sku;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::latest()->get();
        return view('admin.stock.index',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stocks = Stock::all();
        $categories = Category::all();
        $skus = Sku::all();
        return view('admin.stock.create',compact('stocks', 'categories', 'skus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockRequest $request)
    {

        // $imageName = date('YmdHis') . "." . request()->stock_image->getClientOriginalExtension();
        // request()->stock_image->move(public_path('images'), $imageName);

        $stock = new Stock();
        $stock->name = $request->name;
        $stock->price = $request->price;
        $stock->qty = $request->qty;
        $stock->description = $request->description;
        $stock->sku_id = $request->sku_id;
        $stock->category_id = $request->category;
        if($request->stock_image){
            $imageName = date('YmdHis') . "." . request()->stock_image->getClientOriginalExtension();
            request()->stock_image->move(public_path('images'), $imageName);
        $stock->image = $imageName;
        }
        $stock->save();

        return redirect('/stock')->with('message', 'Stock Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($stock)
    {
        // dd($stock);
        $stock = Stock::find($stock);
        $categories = Category::all();
        $skus = Sku::all();
        return view('admin.stock.edit',compact('stock', 'categories', 'skus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StockRequest $request, Stock $stock)
    {

        $stock->name = $request->name;
        $stock->price = $request->price;
        $stock->qty = $request->qty;
        $stock->description = $request->description;
        $stock->sku_id = $request->sku_id;
        $stock->category_id = $request->category;

        if($request->stock_image){
            $imageName = date('YmdHis') . "." . request()->stock_image->getClientOriginalExtension();
            request()->stock_image->move(public_path('images'), $imageName);
        $stock->image = $imageName;
        }

        $stock->save();
        return redirect('stock')->with('message', 'Stock Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return back()->with('message', 'Stock Deleted successfully');
    }

    public function active(Stock $stock)
    {
        $stock->status = config('res.stock_status.active');
        $stock->save();
        return redirect('stock')->with('message', 'Status Updated successfully');
    }

    public function disable(Stock $stock)
    {
        $stock->status = config('res.stock_status.disable');
        $stock->save();
        return redirect('stock')->with('message', 'Status Updated successfully');
    }
}
