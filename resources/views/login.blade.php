<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>login</h2>
                <form action="{{route('logear')}}" method="POST">
                @method('POST')
                @csrf
                <label for="">Usuario</label>
                <input type="text" class="form-control" name="name">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
                <br>
                <button class="btn btn-primary">Entrar</button>
                </form>
                <br>
                <a class="btn btn-secondary" href="/createUsuario">Registrar</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>