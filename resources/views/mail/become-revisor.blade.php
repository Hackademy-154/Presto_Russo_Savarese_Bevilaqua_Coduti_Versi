<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diventa Un Revisor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h4>Richiesta Utente Per Adesione Come Revisor</h4>
            <h6>Ecco i suoi dati :</h6>
            <p>UserName: </p>
            <p>{{$user->name}}</p>
            <p>Email: </p>
            <p>{{$user->email}}</p>
            

            <p>Premi Questo Tasto per Rendere L'Utente Un Revisor</p>
            <a class="btn btn-success" href="{{route('revisor.make',compact('user'))}}">Rendi Revisor {{$user->name}} </a>
        </div>
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>