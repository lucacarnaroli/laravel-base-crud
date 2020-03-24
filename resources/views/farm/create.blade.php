@extends('layouts.layout')

@section('header')

{{-- slide 58, serve in caso lasciamo un campo vuoto, copia incolla da slide --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul> 
        </div>
    @endif
    
@endsection

@section('main')

    <form action="{{((!empty($product))) ? route('product.update',$product->id) : route('product.store')}}" method="post">
        {{-- token virtuale ci serve ogni volta facciamo un form --}}
        @csrf
        @if (!empty($product))
            @method('PATCH')
        @else
            @method('POST')
        @endif

    <input type="text" name="code_of_Product" value="{{((!empty($product))) ? $product->code_of_Product : ''}}" placeholder="codice">
        <input type="text" name="type_of_Product" value="{{((!empty($product))) ? $product->type_of_Product : ''}}" placeholder="tipo">
        <input type="text" name="price" value="{{((!empty($product))) ? $product->price : ''}}" placeholder="prezzo">

        <button type="submit">Salva</button>
    @if (!empty($product))
        <input type="hidden" name="id" value="{{$product->id}}">
    @endif
    </form>
    
@endsection
