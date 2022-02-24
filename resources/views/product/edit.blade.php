<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div class="span3 well">
        <legend>Here you can edit products</legend>
    <form accept-charset="UTF-8" action="/products/{{ $product->id }}/edit" method="post">
        @csrf
        <input class="span3" value="{{ $product->title }}" name="title" type="text"> 
        <input class="span3" value="{{ $product->description }}" name="description" type="text">
        <input class="span3" value="{{ $product->url }}" name="url" type="text">
        <input class="span3" value="{{ $product->price }}" name="price" type="text"> 
        <button class="btn btn-warning" type="submit">Edit Product</button>
    </form>
</div>
</body>
</html>