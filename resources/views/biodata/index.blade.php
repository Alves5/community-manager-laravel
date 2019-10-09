@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>Lista de pessoas</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('biodata.create') }}">Adicionar pessoa</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>Id</b></th>
        <th width = "300px">Nome</th>
        <th>Celular</th>
        <th width = "180px">Action</th>
      </tr>

      @foreach ($biodatas as $biodata)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$biodata->nome}}</td>
          <td>{{$biodata->celular}}</td>
          <td>
            <form action="{{ route('biodata.destroy', $biodata->id) }}" method="post">
              <a class="btn btn-sm btn-success" href="{{route('biodata.show',$biodata->id)}}">Show</a>
              <a class="btn btn-sm btn-warning" href="{{route('biodata.edit',$biodata->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $biodatas->links() !!}
    <div class="col-md-12">
        <a href="{{url('/home')}}" class="btn btn-sm btn-success">Voltar Home</a>
      </div>
  </div>

<footer id="row">
    @include('layouts.footer')
</footer>
@endsection