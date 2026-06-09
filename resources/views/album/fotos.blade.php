<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fotos del Álbum</title>
</head>
<body>

    <h1>Fotos de: {{ $album->nombre }}</h1>

    @if(count($fotos) > 0)

        @foreach($fotos as $foto)

            <hr>

            <h3>{{ $foto->titulo }}</h3>

            <p>Imagen: {{ $foto->imagen }}</p>

        @endforeach

    @else

        <p>Este álbum no tiene fotos registradas.</p>

    @endif

</body>
</html>