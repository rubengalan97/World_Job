<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/botones.css') }}" >
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>Ofertas</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">Ofertas</a>
        <a href="{{route('usuario.perfil', ["idUsu" => Auth::user()->idUsu])}}">Perfil</a>
        <a href="{{route('usuario.misSolicitudes', ["idUsu" => Auth::user()->idUsu])}}">Mis solicitudes</a>
        <a href="{{route("out")}}">Log out</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="cards">
        @foreach ($ofertas as $oferta)
        <div class="card">
            <h2 class="titulos">
                @foreach ($oferta->empresas() as $item)
                    Empresa: {{$item->nombre}}
                @endforeach
            </h2>
            <h3 class="titulos">Descripcion:</h3>
            <p class="descripcion">{{$oferta->descripcion}}</p>
            <h4 class="titulos">Ciudad:</h4>
            <h4 class="titulos">
                @foreach ($oferta->ciudades() as $item)
                    {{$item->ciudad}}
                @endforeach
            </h4>
            <a href="{{route('usuario.aceptarOferta', ["idUsu" => Auth::user()->idUsu, "idOfe" => $oferta->idOfe])}}"><button class="editar">Aceptar oferta</button></a>
        </div>
        @endforeach
    </div>

</body>
</html>