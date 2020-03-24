@extends('layouts.layout')

@section('header')
    <h2>Prodotti alimentari:</h2>
@endsection

@section('main')
    @foreach ($products as $product)
        <ul>
            <li>ID: {{$product ->id}}</li>
            <li>Codice prodotto: {{$product ->code_of_Product}}</li>
            <li>Tipo prodotto: {{$product ->type_of_Product}}</li>
            <li>Prezzo: {{$product ->price}}</li>
        </ul>
    @endforeach
   
@endsection