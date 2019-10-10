@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Editando dados</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('startup.update',$startup->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Nome startup:</strong>
          <input type="text" name="nome" class="form-control" value="{{$startup->nome}}">
        </div>
        <div class="col-md-12">
          <strong>Email :</strong>
          <input class="form-control" type="email" name="email" value="{{$startup->email}}">
        </div>
        <div class="col-md-12">
          <strong>Senha :</strong>
          <input class="form-control" type="password" name="senha" value="{{$startup->senha}}">
        </div>

        <div class="col-md-12">
          <a href="{{route('startup.index')}}" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
        </div>
      </div>
    </form>
  </div>

  <footer id="row">
    @extends('layouts.footer')
  </footer>
@endsection