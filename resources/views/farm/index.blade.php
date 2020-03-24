@extends('layouts.layout')

@section('header')
    <h2>Prodotti alimentari:</h2>

    @if(!empty($id))
        <div>
            Hai cancellato il record {{$id}}
        </div>
    @endif
@endsection

@section('main')
    @foreach ($products as $product)
        <ul>
            <li>ID: {{$product ->id}}</li>
            <li>Codice prodotto: {{$product ->code_of_Product}}</li>
            <li>Tipo prodotto: {{$product ->type_of_Product}}</li>
            <li>Prezzo: {{$product ->price}}</li>
            <li>
                {{-- per sicurezza è meglio fare un form con il delete --}}
                {{-- product->id indica cosa deve andare a cancellare DELETE --}}
                <form action="{{route('product.destroy', $product->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit">DELETE</button>
                </form>
            </li>
        </ul>
    @endforeach
   
@endsection