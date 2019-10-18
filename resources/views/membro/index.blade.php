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
  <div class="text-center">
    <img style="width: 220px; height: 150px;" src="{{asset('image/logo-bioazul.png')}}" class="rounded">
  </div>
    <div style='margin-bottom: 30px;' class="col-md-12">
        <a style='position: relative; float: right;' href="{{ route('register') }}" class="btn btn-sm btn-success">Adicionar membro</a>
    </div>
    <div class='rows'>
        <table class="table table-hover table-dark">
            <thead class='thead-dark'>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">E-mail</th>
                  <th scope='col'>Ativo</th>
                </tr>
            </thead>
           
    </table>
    </div>

    <div class="col-md-12">
        <a href="{{url('/home')}}" class="btn btn-sm btn-success">Voltar Home</a>
    </div>
</div>

<footer id="row">
    @include('layouts.footer')
</footer>
</body>
</html>