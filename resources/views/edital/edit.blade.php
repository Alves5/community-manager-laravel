<!-- createEital.blade.php - edital -->
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
<div style='margin: 20px 0 30px 0;' class="container">
        <div class='col-md-5 mx-auto'>
            <h1>Atualizar edital</h1>  
            <form action="{{route('updateEdital', $edital->id)}}" method="post">
                @csrf
                <div class="form-group row men">
                    <input type="text" class="form-control" name='titulo' value='{{$edital->titulo}}' placeholder="Título do edital" required>
                </div>
                <div class="form-group row men">
                    <input type="text" class="form-control" name='descricao' value='{{$edital->descricao}}' placeholder="Descriçao do edital" required>
                </div>
                <div class="form-group row men">
                    <input type="text" class="form-control" name='link' value='{{$edital->link}}'  placeholder="link do edital">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Salvar edição</button>
            </form>
        </div>
    </div>
</body>
</html>