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

    <form action="{{route('biodata.update',$biodata->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Nome :</strong>
          <input type="text" name="nome" class="form-control" value="{{$biodata->nome}}">
        </div>
        <div class="col-md-12">
          <strong>Celular :</strong>
          <input class="form-control" type="text" name="celular" value="{{$biodata->celular}}">
        </div>

        <div class="col-md-12">
          <a href="{{route('biodata.index')}}" class="btn btn-sm btn-success">Voltar</a>
          <button type="submit" class="btn btn-sm btn-primary">Enviar</button>
        </div>
      </div>
    </form>
  </div>

  <footer id="row">
    @extends('layouts.footer')
  </footer>
@endsection