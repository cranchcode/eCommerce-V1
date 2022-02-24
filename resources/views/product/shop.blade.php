<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="card card-inverse card-info">
                        <div class="card-block">
                            <figure class="profile profile-inline">
                                <img src="{{ $product->url }}" class="profile-avatar" alt="" width="255px" height="160px">
                            </figure>
                            <h4 class="card-title">{{ $product->title }}</h4>
                            <div class="card-text">
                                {{ $product->description }}
                            </div>
                            <div class="card-text">
                                {{ $product->price }}$
                            </div>
                        </div>
                        @isset($user)
                            <div class="card-footer">

                                <form action="/products/{{ $product->id }}/edit" method="get">
                                    <button type="submit" class="btn btn-info btn-sm">Edit</button>
                                </form>

                                <form action="/products/{{ $product->id }}/delete" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-sm">Delete</button>
                                </form>
                            </div>
                        @endisset
                        <div class="card-footer">
                            <button class="btn btn-info btn-sm">Add to cart</button>
                        </div>
                    </div>
                </div>
            @endforeach
            
            @isset($user)
                <div class="span3 well">
                        <legend>Here you can create products</legend>
                    <form accept-charset="UTF-8" action="/product/create" method="post">
                        @csrf
                        <input class="span3" name="title" placeholder="Product Title" type="text"> 
                        <input class="span3" name="description" placeholder="Product Description" type="text">
                        <input class="span3" name="url" placeholder="Image URL" type="text">
                        <input class="span3" name="price" placeholder="Product Price" type="text"> 
                        <button class="btn btn-warning" type="submit">Create Product</button>
                    </form>
                </div>
            @endisset
        </div>
</div>
</body>
</html>