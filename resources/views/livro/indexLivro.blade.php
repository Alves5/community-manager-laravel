@extends('layouts.app')

@section('content')

<div class="container">
    <div style='margin-bottom: 30px;' class="col-md-12">
        <a style='position: relative; float: right;' href="" class="btn btn-sm btn-success">Adicionar Livros</a>
    </div>
    <div class='rows'>
        <table class="table table-hover">
            <thead class='thead-dark'>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Páginas</th>
                </tr>
            </thead>
                <!-- foreach aqui -->
                    <tr>
                        <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
    </table>
    </div>


    <div class="col-md-12">
        <a href="{{url('/home')}}" class="btn btn-sm btn-success">Voltar Home</a>
    </div>
</div>

<footer id="row">
    @include('layouts.footer')
</footer>
@endsection