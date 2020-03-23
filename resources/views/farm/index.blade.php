<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('product.store')}}" method="post">
        @csrf
        <input type="text" name="code_of_Product" value="" placeholder="codice">
        <input type="text" name="type_of_Product" value="" placeholder="tipo">
        <input type="text" name="price" value="" placeholder="prezzo">

        <button type="submit">Salva</button>
        
        
        @method('POST')
        
    </form>
</body>
</html>