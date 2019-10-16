<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/3795336791.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
<div class="container">
  <div id="sub-cont">
    <div id="title" class="row">
      <div class="col-lg-12">
        <h2><i class="fas fa-user-plus"></i> Cadastrar Startup</h2>
      </div>
    </div>

    <div id="form-start">
      <form action="{{ route('membro.store')}}" method="post">
        @csrf
        <div class="row">
          <div class="col-md-12 start">
            <input id="nome" type="text" name="nome" class="form-control" placeholder="Nome completo">
          </div>
          <div class="col-md-12 start">
            <input style="text-transform: lowercase;" class="form-control" type="email" placeholder="E-mail" name="email">
          </div>
          <div class="col-md-12 start">
            <input class="form-control" type="text" placeholder="Senha(provisória)" name="senha">
            <small id="emailHelp" class="form-text text-muted">A senha deve conter entre 5 e 6 caracteres.</small>
              <!-- Pode se đazer uma ação com JavaScript para enviar
              somente se tudo estiver nos conformes -->
              <button type="submit" class="btn btn-sm btn-primary">Enviar dados  <i class="fas fa-chevron-right"></i></button>
          </div>
        </div>
      </form>
    </div>

  </div>
</div>

<footer id='row'>
    @include('layouts.footer')
</footer>
</body>
</html>