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
    </br>
    <div class="container">
        <div class="row">
            <div class="col-ms-12">
                <div class="card">
                    <div class="card-header">
                        Crear Productos
                    </div>
                    <div class="card-body">
                        <form action="{{route('products.store')}}" method="post">
                            <!-- Con este "comando" y por el uso de Laravel y el motor de plantillas Blade, 
                            creamos un toquen que se verificará al momento de hacer envíos a la DB -->
                            @csrf 
                            <div class="form-group">
                                <label for="producto">producto</label>
                                <input class ="form-control" type="text" name="producto" id="producto">
                                <label for="descripcion">descripción</label>
                                <input class ="form-control" type="text" name="descripcion" id="descripcion">
                                <label for="valor">valor</label>
                                <input class ="form-control" type="number" name="valor" id="valor">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success float-right" type="submit">Guardar</button>
                                <a class="btn btn-danger" href="{{route('products.list')}}">Cancelar</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>