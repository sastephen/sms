<?php

namespace App\Http\Controllers;

use App\Models\Sku;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response         
     */
    public function index()
    {
        $skus = Sku::latest()->get();
        return view('admin.sku.index',compact('skus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sku = new Sku();
        $sku->name = $request->name;
        $sku->save();

        return redirect()->back()->with('message', 'Sku Created successfully');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sku)
    {
        // dd($sku);
        $sku = Sku::find($sku);
        $sku->name = $request->name;
        $sku->save();

        return redirect()->back()->with('message', 'Sku Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sku $sku)
    {
        $sku->delete();
        return back()->with('message', 'Sku remove successfully ');
    }
}
