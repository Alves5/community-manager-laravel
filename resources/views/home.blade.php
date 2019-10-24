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
                            <i class="fas fa-key"></i>
                            <a href="{{url('/Recuperar')}}">Página de recuperar senha</a>
                        </div>
                        <div>
                            <i class="fas fa-users"></i>
                            <a href="{{url('/dadosMentoresMembros')}}">Adicionar dados mentores/membros</a>
                        </div>
                        <div>
                            <i class="fas fa-key"></i>
                            <a href="{{url('/Alterar')}}">Alterar senha</a>
                        </div>
                        <div>
                            <i class="fas fa-book"></i>
                            <a href="{{url('/ShowEdital')}}">Adicionar editais</a>
                        </div>
                        <div>
                            <i class="fas fa-envelope-square"></i>
                            <a href="{{url('/Email')}}">Enviar email</a>
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