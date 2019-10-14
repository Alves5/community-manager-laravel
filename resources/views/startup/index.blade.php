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
                    <a onclick='startup({{$startup->id}});' class="btn btn-sm btn-warning" href="javascript:func()">Inativo</a>
                  @else
                    <a onclick='startup({{$startup->id}});' class="btn btn-sm btn-success" href="javascript:func()">Ativo</a>
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
<script>
  function startup(id){
    Swal.fire({
        title: 'Confirmação:',
        text: "Você deseja realmente inativar ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar'
      }).then((result) => {
        if (result.value) {
          window.location.href = "startup/index/"+id;
        }
      })
      
}
</script>
@endsection