<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ElementController extends Controller
{
    private $validationProduct = [
            'code_of_Product' =>  'required|string|max:255',
            'type_of_Product' =>  'required|string|max:255',
            'price' => 'required|numeric',   
        ];
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
            // una volta che mi salva il dato mi ridarà in show l'ultimo dato inserito
            // al posto di orderBy si può usare anche last();
            $product = Product::orderBy('id','desc')->first();
            return redirect()->route('product.show',compact('product'));
        } else {
            dd('Is not saved');
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 1 METODO 
    // public function show($id)
    // {
    //     $product = Product::find($id);
         
    //     if (empty($product)) {
    //         abort('404');
    //     }
    //     return view('farm.show',compact('product'));
    // }

    // 2 METODO --> IN ALTERNATIVA PIU' SEMPLICE SI POTREBBE SCRIVERE:
    public function show(Product $product)
    {
        // $product = Product::find($id);

        if (empty($product)) {
            abort('404');
        }
        return view('farm.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // se è vuoto mi darà error 404
        if (empty($product)) {
            abort('404');
        }
        return view('farm.create', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // update è simile a save 
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (empty($product)) {
            abort('404');
        }
        $data = $request->all();
        $request->validate($this->validationProduct);
        $updated = $product->update($data);

        if ($updated == true) {
            $product = Product::find($id);
            return redirect()->route('product.show', compact('product'));
        } else {
            dd('Is not saved');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $id = $product->id;
        $deleted = $product->delete();
        $data = [
            'id' => $id,
            'products' => Product::all(),
        ];

        return view('farm.index',$data);
    }
}
