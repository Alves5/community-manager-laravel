<!-- index.blade.php : pasta ->recuperarS -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">   
        <img src="{{asset('image/logo-bioazul.png')}}" class="rounded" alt="...">
    </div>
  <div id="sub-cont-trocar">
    <div id="title-trocar" class="row">
      <div class="col-lg-12">
        <h2>Trocar senha <i class="fas fa-key"></i></h2>
      </div>
    </div>

    <div id="form-start-trocar">
      <form action="#" method="post" name='formTrocarSenha'>
        @csrf
        <div class="row">
            <div class="col-md-12 start-trocar">
                <input class="form-control" type="text" placeholder="Nova senha" name="novaSenha">
                <small id="emailHelp" class="form-text text-muted">A senha deve conter entre 6 e 12 caracteres.</small> 
                  <!-- Pode se đazer uma ação com JavaScript para enviar
                somente se tudo estiver nos conformes -->
            </div>
            <div class="col-md-12 start-trocar">
                <input class="form-control" type="text" placeholder="Repita a senha" name="repitaSenha">
                <button type="button" onclick='validarSenhas();' class="btn btn-sm btn-primary">Modificar senha  <i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>

<footer id='row'>
    @include('layouts.footer')
</footer>
@endsection