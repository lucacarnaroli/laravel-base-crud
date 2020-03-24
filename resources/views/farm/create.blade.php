@extends('layouts.layout')

@section('main')

    <form action="{{route('product.store')}}" method="post">
        @csrf
        @method('POST')
        <input type="text" name="code_of_Product" value="" placeholder="codice">
        <input type="text" name="type_of_Product" value="" placeholder="tipo">
        <input type="text" name="price" value="" placeholder="prezzo">

        <button type="submit">Salva</button>
        
    </form>
    
@endsection
