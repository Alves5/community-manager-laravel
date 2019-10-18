<!-- index.blade.php - Formulário de dados pessoais dos mentores e membros -->
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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <style>
        .men{
            margin: 10px 0 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class='col-md-5 mx-auto'>
            <form action="{{route('dadosMentoresMembros.update', $dados->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="custom-file row men">
                    <input type="file" class="custom-file-input" name='foto' id="customFile" disabled>
                    <label class="custom-file-label" for="customFile">Sua foto</label>
                </div>
                <div class="form-group row men">
                    <input type="text" class="form-control" name='nome'  placeholder="* Seu nome" value='{{$dados->nome}}' required>
                </div>
                <div class="form-group row men">
                    <input type="date" class="form-control" name='dataNasc' value='{{$dados->dataNasc}}' required>
                </div>
                <div class="form-group row men">
                    <input type="text" class="form-control" name='especializacao'  placeholder="Alguma especialização" value='{{$dados->especializacao}}'>
                </div>
                <div class="form-group row men">
                    <input type="text" class="form-control" name='telefone'  placeholder="Seu telefone" value='{{$dados->telefone}}'>
                </div>
                <div class="form-group row men">
                    <input type="text" class="form-control" name='endereco'  placeholder="endereco" value='{{$dados->endereco}}'>
                </div>
                <div class="form-group row men">
                    <label for="inputState">Rede social</label>
                    <select id="inputState" class="form-control" name='redesSociais' value='{{$dados->redesSociais}}'>
                        <option selected>Nenhuma</option>
                        <option>Facebook</option>
                        <option>Instagram</option>
                        <option>Gitlab</option>
                    </select>
                </div>
                <div class="form-group row men">
                    <label for="exampleFormControlTextarea1">Sobre você</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name='sobre' rows="3" value='{{$dados->sobre}}'></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Salvar</button>
            </form>
        </div>
    </div>
</body>
</html>
