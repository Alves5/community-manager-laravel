@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Adicionar nova Startup</h3>
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

    <form action="{{ route('startup.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Nome startup :</strong>
          <input type="text" name="nome" class="form-control" placeholder="Ex: remédioZap">
        </div>
        <div class="col-md-12">
          <strong>E-mail :</strong>
          <input style="text-transform: lowercase;" class="form-control" type="email" placeholder="Ex: remediozap@gmail.com" name="email">
        </div>
        <div class="col-md-12">
          <strong>Senha :</strong>
          <input style="text-transform: uppercase;" class="form-control" type="text" placeholder="******" name="senha">
          <small id="emailHelp" class="form-text text-muted">A senha deve conter entre 6 e 12 caracteres.</small>
        </div>

        <div class="col-md-12">
            <a href="{{ route('startup.index')}}" class="btn btn-sm btn-success">Voltar</a>
            <!-- Pode se đazer uma ação com JavaScript para enviar
            somente se tudo estiver nos conformes -->
          <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
        </div>
      </div>
    </form>

  </div>

<footer id='row'>
    @include('layouts.footer')
</footer>
@endsection