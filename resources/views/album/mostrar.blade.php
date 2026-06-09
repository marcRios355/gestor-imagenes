<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Álbumes</title>
</head>
<body>

    <h1>Mis Álbumes</h1>

    @if(count($albumes) > 0)

        @foreach($albumes as $album)

            <hr>

            <h3>{{ $album->nombre }}</h3>

            <p>{{ $album->descripcion }}</p>

            <a href="{{ route('fotos.index', $album->id) }}">
                Ver Fotos
            </a>

        @endforeach

    @else

        <p>No tienes álbumes registrados.</p>

    @endif

</body>
</html>