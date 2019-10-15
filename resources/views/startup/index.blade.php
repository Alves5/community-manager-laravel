@extends('layouts.app')

@section('content')
<div class="container">
    <div style='margin-bottom: 30px;' class="col-md-12">
        <a style='position: relative; float: right;' href="{{route('startup.create')}}" class="btn btn-sm btn-success">Adicionar Startup</a>
    </div>
    <div class='rows'>
        <table class="table table-hover table-dark">
            <thead class='thead-dark'>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">senha</th>
                  <th scope='col'>Ativo</th>
                </tr>
            </thead>
            @foreach ($startups as $startup)
              <tr>
                <td>{{++$i}}</td>
                <td>{{$startup->nome}}</td>
                <td>{{$startup->email}}</td>
                <td>{{$startup->senha}}</td>
                <td>
                  @if($startup->ativo)
                    <a class="btn btn-sm btn-warning" href="{{route('startup.show', $startup->id)}}">Inativo</a>
                  @else
                    <a class="btn btn-sm btn-success" href="{{route('startup.show', $startup->id)}}">Ativo</a>
                  @endif
                </td>
              </tr>
            @endforeach
    </table>
    </div>

    {!! $startups->links() !!}
    <div class="col-md-12">
        <a href="{{url('/home')}}" class="btn btn-sm btn-success">Voltar Home</a>
    </div>
</div>

<footer id="row">
    @include('layouts.footer')
</footer>
@endsection