<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        
        return view('farm.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $request->validate([
            'code_of_Product' =>  'required|string|max:255',
            'type_of_Product' =>  'required|string|max:255',
            'price' => 'required|numeric',   
        ]);
        // $product ->code_of_Product = $data['code_of_Product'];
        // $product ->type_of_Product = $data['type_of_Product'];
        // $product ->price = $data['price'];

        // nuova instanza
        $newProduct = new Product;
        // fill prende cio che sta in fillable, risparmiando di scrivere ciò che è commentato sopra
        $newProduct->fill($data);
        // saved è come un insert, va a inserire un dato
        $saved = $newProduct->save();
        // se il saved è andato a buon fine =(true) allora mi riporterà alla index
        if($saved == true){
            return redirect()->route('product.index');
        }

       
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
