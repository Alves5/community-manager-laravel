@extends('layouts.app')

@section('content')
<div class="container">
    <div style='margin-bottom: 30px;' class="col-md-12">
        <a style='position: relative; float: right;' href="{{ route('startup.create')}}" class="btn btn-sm btn-success">Adicionar Startup</a>
    </div>
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif
    <div class='rows'>
        <table class="table table-hover">
            <thead class='thead-dark'>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">senha</th>
                <th scope='col'>Action</th>
                </tr>
            </thead>
            @foreach ($startups as $startup)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$startup->nome}}</td>
          <td>{{$startup->email}}</td>
          <td>{{$startup->senha}}</td>
          <td>
            <form action="{{ route('startup.destroy', $startup->id) }}" method="post">
              <a class="btn btn-sm btn-success" href="{{route('startup.show',$startup->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('startup.edit',$startup->id)}}">Edit</a>
              <!-- Criar um alert(SweetAlert) para mostrar mensagem de confirmação de inativação-->
              <!-- <a class="btn btn-sm btn-warning" href="{{route('startup.inativar',$startup->id)}}">Inativar</a> -->
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Remover</button>
            </form>
          </td>
          <!-- Coluna para saber se esta ativo ou não -->
          <td style='visibility: collapse'>{{$startup->ativo}}</td>
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