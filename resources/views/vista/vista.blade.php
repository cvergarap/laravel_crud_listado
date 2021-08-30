<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1>Esto es una vista con Laravel</h1>
    <h3>Productos</h3>
    <div class="container">
        <div class="row">
            <div class="col-ms-12">
                <div class="card">
                    <div class="card-header">
                        Listado de productos
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @foreach($Allproducts as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                       
                                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-sm btn-warning">OK</a>

                                        <a href="javascript: document.getElementById('fomrdelete{{$product->id}}').submit()" class="btn btn-sm btn-danger">X</a>

                                        <form id="fomrdelete{{$product->id}}" action="{{route('products.destroy', $product->id)}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <!-- <button type="submit" class="btn btn-danger">X{{$product->id}}</button> -->
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="card-footer">
                        <div>
                            @if(session('ok'))
                                <div class="alert alert-success">
                                    {{session('ok')}}
                                </div>
                            @endif
                            @if(session('info'))
                                <div class="alert alert-warning">
                                    {{session('info')}}
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                            @endif
                        </div>
                        <a href="{{route('products.create')}}" class="btn btn-success btn-sm float-right">Agregar Producto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>