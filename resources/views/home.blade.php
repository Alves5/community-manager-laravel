@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <div>
                            <i class="fas fa-user-plus"></i>
                            <a href="{{url('/biodata')}}">Inserir Pessoas</a>
                        </div>
                        <div>
                            <i class="fas fa-book"></i>
                            <a href="{{url('/livro')}}">Inserir Livros</a>
                        </div>
                        <div>
                            <i class="fas fa-rocket"></i>
                            <a href="{{url('/startup')}}">Inserir Startup</a>
                        </div>
                        <div>
                            <i class="fas fa-rocket"></i>
                            <a href="{{url('/Recuperar')}}">Página de trocar senha</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer id="row">
    @include('layouts.footer')
</footer>
@endsection