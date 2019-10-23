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
    <div id='detail-edital' class="container">
        <a id='arrow-left' href="/ShowEdital"><i class="fas fa-arrow-left fa-2x"></i></a>

        <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-tools"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edital{{$edital->id}}"><i class="fas fa-edit"></i> Atualizar</a>
                <a class="dropdown-item" onclick='editalRemove({{$edital->id}});' href='javascript:function'>
                    <i class="fas fa-trash"></i> Remover
                </a>
            </div>
        </div>          
                <div id="edital{{$edital->id}}" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adicionar editais</h5>
                            </div>
                            <div class="modal-body">
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
                    </div>   
                </div> 

        <div class="text-center">
            <img  src="{{asset('image/edital-default.png')}}" class="rounded img-fluid">
        </div>
        <h1>{{$edital->titulo}}</h1>
        <p class="text-justify">{{$edital->descricao}}</p>
        <p id='link-edital'><b>Edital:</b> para ter acesso ao edital, <a href="{{$edital->link}}">link</a></p>
    </div>
</body>
</html>