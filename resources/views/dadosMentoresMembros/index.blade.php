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
            <form action="{{route('dadosMentoresMembros.store')}}" method="post">
                @csrf
                <div class="custom-file row men">
                    <input type="file" class="custom-file-input" name='foto' id="customFile" disabled>
                    <label class="custom-file-label" for="customFile">Sua foto</label>
                </div>
                <div class="form-group row men">
                    <input type="text" class="form-control" name='nome'  placeholder="* Seu nome" required>
                </div>
                <div class="form-group row men">
                    <input type="date" class="form-control" name='dataNasc' required>
                </div>
                <div class="form-group row men">
                    <input type="text" class="form-control" name='especializacao'  placeholder="Alguma especialização">
                </div>
                <div class="form-group row men">
                    <input type="text" class="form-control" name='telefone'  placeholder="Seu telefone">
                </div>
                <div class="form-group row men">
                    <input type="text" class="form-control" name='endereco'  placeholder="endereco">
                </div>
                <div class="form-group row men">
                    <label for="inputState">Rede social</label>
                    <select id="inputState" class="form-control" name='redesSociais'>
                        <option selected>Nenhuma</option>
                        <option>Facebook</option>
                        <option>Instagram</option>
                        <option>Gitlab</option>
                    </select>
                </div>
                <div class="form-group row men">
                    <label for="exampleFormControlTextarea1">Sobre você</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name='sobre' rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Salvar</button>
            </form>
        </div>
        <div class='col-md-9 mx-auto'>
            <table class="table table-hover table-sm table-dark">
                <tr>
                    <th width = "50px"><b>Id</b></th>   
                    <th width = "180px">Nome</th>
                    <th width='180px'>Data nasc.</th>
                    <th width='180px'>Especialização</th>
                    <th width='180px'>Telefone</th>
                    <th width='180px'>Endereço</th>
                    <th width='180px'>Redes s.</th>
                    <th width = "300px">Action</th>
                </tr>

            @foreach ($dados as $dado)
            <tr>
                <td><b>{{++$i}}.</b></td>
                <td>{{$dado->nome}}</td>
                <td>{{$dado->dataNasc}}</td>
                <td>{{$dado->especializacao}}</td>
                <td>{{$dado->telefone}}</td>
                <td>{{$dado->endereco}}</td>
                <td>{{$dado->redesSociais}}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{route('dadosMentoresMembros.show', $dado->id)}}">Edit</a>
                </td>
            </tr>
            @endforeach
            </table>

        </div>
    </div>
</body>
</html>
