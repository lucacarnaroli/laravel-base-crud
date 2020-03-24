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

    <form action="{{route('product.store')}}" method="post">
        {{-- token virtuale ci serve ogni volta facciamo un form --}}
        @csrf
        @method('POST')
        <input type="text" name="code_of_Product" value="" placeholder="codice">
        <input type="text" name="type_of_Product" value="" placeholder="tipo">
        <input type="text" name="price" value="" placeholder="prezzo">

        <button type="submit">Salva</button>
        
    </form>
    
@endsection
