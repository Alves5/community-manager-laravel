@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Detalhes</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <strong>Nome : </strong> {{$biodata->nome}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Celular : </strong> {{$biodata->celular}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('biodata.index')}}" class="btn btn-sm btn-success">Voltar</a>
      </div>
    </div>
  </div>

  <footer id="row">
    @include('layouts.footer')
</footer>
@endsection