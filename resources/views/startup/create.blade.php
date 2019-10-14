@extends('layouts.app')

@section('content')
<div class="container">
  <div id="sub-cont">
    <div id="title" class="row">
      <div class="col-lg-12">
        <h2><i class="fas fa-user-plus"></i> Cadastrar Startup</h2>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Ops! </strong> pode haver um erro na entrada.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div id="form-start">
      <form action="{{ route('startup.store')}}" method="post">
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
            <small id="emailHelp" class="form-text text-muted">A senha deve conter entre 6 e 12 caracteres.</small>
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
@endsection