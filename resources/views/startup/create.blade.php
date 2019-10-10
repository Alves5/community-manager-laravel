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
          <input class="form-control" type="email" placeholder="Ex: remediozap@gmail.com" name="email">
        </div>
        <div class="col-md-12">
          <strong>Senha :</strong>
          <input class="form-control" type="password" placeholder="Gere uma senha" name="senha">
        </div>

        <div class="col-md-12">
            <a href="{{ route('startup.index')}}" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
        </div>
      </div>
    </form>

  </div>

<footer id='row'>
    @include('layouts.footer')
</footer>
@endsection