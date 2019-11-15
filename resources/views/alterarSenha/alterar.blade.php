<!-- alterar.blade.php - alterarSenha -->
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
        <img src="{{asset('image/logo-bioazul.png')}}" class="rounded" alt="...">
    </div>
  <div id="sub-cont-trocar">
    <div id="title-trocar" class="row">
      <div class="col-lg-12">
        <h2>Alterar senha <i class="fas fa-key"></i></h2>
      </div>
    </div>

    <div id="form-start-trocar">
      <form action="#" method="post" name='formTrocarSenha'>
        @csrf
        <div class="row">
            <div class="col-md-12 start-trocar">
                <input class="form-control" type="text" placeholder="Digite sua senha antiga" name="senhaAntiga">
            </div>
            <div class="col-md-12 start-trocar">
                <input class="form-control" type="text" placeholder="Nova senha" name="novaSenha">
                <small id="emailHelp" class="form-text text-muted">A senha deve conter entre 6 e 12 caracteres.</small> 
            </div>
            <div class="col-md-12 start-trocar">
                <input class="form-control" type="text" placeholder="Repita a senha" name="repitaSenha">
                <button type="button" onclick='validarSenhas();' class="btn btn-sm btn-primary">Alterar senha  <i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>