<!-- index.blade.php - edital -->
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
        <div class="jumbotron jumbotron-fluid edital-logo">
            <a id='arrow-left-edital' href="/home"><i class="fas fa-arrow-left fa-2x"></i></a>
            <div class="container">
                <h1 class="display-4">Editais de Concurso e Seleções</h1>
            </div>
        </div>

        <div id='search-edital'>
            <form action="{{url('/ShowEdital')}}" class="form-inline my-2 my-lg-0" method='post' name='formSearch'>
                @csrf
                <div class="form-group">
                        <input class="form-control mr-sm-2" type="search" name='search' aria-label="Search" id="search-edital">
                        <a onclick='enviarPesquisa();'><i class="fas fa-search"></i></a>
                </div>
            </form>
        </div>

            <!-- Small modal --> 
        <a id='open-create-edital' data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-file-medical fa-2x" aria-hidden="true"></i></a>

        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div id='modal-create-edital' class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar editais</h5>
                </div>
                <div id='form-modal' class="modal-body">
                    <form action="{{route('createEdital')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="tituloEdital">Título</label>
                            <input id='tituloEdital' type="text" class="form-control" name='titulo'  placeholder="Título do edital" required>
                        </div>
                        <div class="form-group">
                            <label for="descricaoEdital">Descrição</label>
                            <textarea id="descricaoEdital" class="form-control" id="exampleFormControlTextarea1" name='descricao' rows="2" style='resize: none;'></textarea>
                        </div>
                        <div class="form-group">
                            <label for="linkEdital">Link</label>
                            <input id='linkEdital' type="url" class="form-control" name='link'  placeholder="link do edital">
                        </div>
                        <button id='save-edital' type="submit" class="btn btn-primary mb-2">Salvar <i class="fas fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
        </div>

    <div style='margin-top: 60px;' class="container">
        <div class='row'>
            
            @foreach($edital as $edi)
                <div onclick='detailEdital({{$edi->id}});' class='card-group edital-card mx-auto'>
                    <div class="card">
                        <img src="{{asset('image/edital-default.png')}}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{$edi->titulo}}</h5>
                            <small>{{$edi->created_at}}</small>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</body>
</html>