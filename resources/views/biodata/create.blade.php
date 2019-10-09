@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Adicionar nova pessoa</h3>
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

    <form action="{{route('biodata.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Nome completo :</strong>
          <input type="text" name="nome" class="form-control" placeholder="Seu nome">
        </div>
        <div class="col-md-12">
          <strong>Celular :</strong>
          <input class="form-control" type="text" placeholder="Seu celular" name="celular">
        </div><br><br>

        <div class="col-md-12">
          <a href="{{route('biodata.index')}}" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
        </div>
      </div>
    </form>

  </div>
  <footer id="row">
    @include('layouts.footer')
</footer>
@endsection