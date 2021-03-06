<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/perfil.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" >
    <script src="{{ asset('js/nav.js') }}"></script>
    <title>{{__('messages.edit_user')}}</title>
</head>
<body>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">{{__('messages.edit_user')}}</a>
        <a href="{{route('usuario.perfil', ["idUsu" => Auth::user()->idUsu])}}">{{__('messages.profile')}}</a>
        <a href="{{route('usuario.borrarPerfil', ["idUsu" => Auth::user()->idUsu])}}">{{__('messages.delete_user')}}</a>
        <a href="{{route('usuario.misSolicitudes', ["idUsu" => Auth::user()->idUsu])}}">{{__('messages.requests')}}</a>
        <a href="{{route('usuario.ofertas')}}">{{__('messages.offers')}}</a>
        <a href="{{route("out")}}">{{__('messages.log_out')}}</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="img">
        <img id="perfilImagen" src="{{ asset('img/'.$usuario->imagen.'') }}" alt="Imagen usuario">
    </div>

    <div class="container">
        <form action="{{route('usuario.guardarPerfil', ["idUsu" => Auth::user()->idUsu])}}" method="post">
            @csrf
            <div class="row">
                <div class="col-25">
                  <label for="email">{{__('messages.email')}}</label>
                </div>
                <div class="col-75">
                  <input type="email" name="email" id="email" value="{{$usuario->email}}" >
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="ultimos_estudios">{{__('messages.studies')}}</label>
                </div>
                <div class="col-75">
                  <textarea id="ultimos_estudios" name="ultimos_estudios" style="height:200px" >{{$usuario->ultimos_estudios}}</textarea>
                </div>
                <div class="col-25">
                  <label for="descripcion">{{__('messages.description')}}</label>
                </div>
                <div class="col-75">
                  <textarea id="descripcion" name="descripcion" style="height:200px" >{{$usuario->descripcion}}</textarea>
                </div>
              </div>
          <div class="row">
            <input type="submit" value="{{__('messages.send')}}">
          </div>
        </form>
      </div>
    
</body>
</html>