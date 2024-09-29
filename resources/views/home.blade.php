<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exito</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=UnifrakturMaguntia&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <ul class="nav-links">
            <li><a href="{{route('crearPersonaje')}}">Crear Personaje</a></li>
        </ul>
    </nav>
    <div>
        @if($personajes->isEmpty())
            <h1>¡Aquí aparecerán tus personajes cuando crees alguno!</h1>
        @else
            <div class="personajes">
                @foreach ($personajes as $item)
                    <div class="personaje">
                        <h1>{{$item->nombre}}</h1>
                        <h2>{{$item->raza}} {{$item->clase}}</h2>
                        <h2>Nivel: {{$item->nivel}}</h2>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>

</html>