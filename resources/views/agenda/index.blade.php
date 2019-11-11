<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/3795336791.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- Uikit -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/css/uikit.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.2.0/js/uikit-icons.min.js"></script>

    <!-- FullCalendar -->
    <link href="{{ asset('css/fullCalendar/core-main.css') }}" rel='stylesheet' />
    <link href="{{ asset('css/fullCalendar/day-main.css') }}" rel='stylesheet' />

    <script src="{{ asset('js/fullCalendar/core-main.js') }}"></script>
    <script src="{{ asset('js/fullCalendar/inte-main.js') }}"></script>
    <script src="{{ asset('js/fullCalendar/day-main.js') }}"></script>
    <script src="{{ asset('js/fullCalendar/pt-br.js') }}"></script>

    <style>
      .agenda-eventos{
        border-radius: 5px;
      }
      .agenda-cor-evento{
        position: relative;
        width: 30px;
        height: 6px;
        margin: 4% 0 0 3%;
        border-radius: 5px;
      }
      .agenda-data-evento{
        position: relative;
        font-size: 10px;
        margin: 2% 2% 0 4%;
      }
    </style>
  </head>
  <body>
 <!-- Uikit -->
      @foreach($agenda as $gen)
        <button id='desc{{$gen->id}}' style='display: none;' class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-flip{{$gen->id}}">Reveal</button>
        <div id="offcanvas-flip{{$gen->id}}" uk-offcanvas="flip: flip;">
          <div style='width: 300px;' class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <h4 class="uk-comment-title uk-margin-remove">{{$gen->titulo}}</h4>
            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-top">
              <li>{{$gen->start_date}}</li>
              <li>{{$gen->hora_criacao}}</li>
            </ul>
            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-top">
              <li>{{$gen->evento}}</li>
            </ul>
            <div class="uk-comment-body">
              <p>{{$gen->descricao}}</p>
            </div>
            <ul uk-accordion>
              <li>
                <a class="uk-accordion-title" href="#">Atualizar</a>
                <div class="uk-accordion-content">
                            <form action="{{ route('AtualizarEvento', $gen->id) }}" method='post'>
                              @csrf
                              <div class="uk-margin" action='' method='post'>
                                  <div class="uk-inline">
                                      <a class="uk-form-icon" href="#"><i class="far fa-edit"></i></a>
                                      <input class="uk-input" type="text" name='titulo' placeholder='Adicionar título...' value='{{$gen->titulo}}'>
                                  </div>
                              </div>

                              <div class="uk-margin">
                                <div uk-form-custom="target: > * > span:first-child">
                                    <select name='evento' required>
                                      <option value=''>Add. o evento...</option>
                                      <option value='mentoria'>Mentoria</option>
                                      <option value='eventos'>Eventos</option>
                                      <option value='cursos'>Cursos</option>
                                      <option value='oficinas'>Oficinas</option>
                                      <option value='reunioes'>Reuniões</option>
                                    </select>
                                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                                        <span></span>
                                    </button>
                                </div>
                              </div>

                              <div class="uk-margin">
                                <div uk-form-custom="target: > * > span:first-child">
                                      <select name='mentor' required>
                                        <option value=''>Add. mentor...</option>
                                        <option value='luis'>Luiz Eduardo</option>
                                        <option value='maruska'>Maruska</option>
                                        <option value='marina'>Marina Lecas</option>
                                        <option value='diego'>Diego Saulo</option>
                                      </select>
                                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                                        <span></span>
                                    </button>
                                </div>
                              </div>

                              <div class="uk-margin">
                                <div uk-form-custom="target: > * > span:first-child">
                                      <select name='local' required>
                                        <option value=''>Add. local...</option>
                                        <option value='sala_1'>Sala 1</option>
                                        <option value='sala_2'>Sala 2</option>
                                        <option value='sala_3'>Sala 3</option>
                                        <option value='launcher'>Launcher</option>
                                      </select>
                                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                                        <span></span>
                                    </button>
                                </div>
                              </div>

                              <div class="uk-margin" action='' method='post'>
                                  <div class="uk-inline">
                                      <a class="uk-form-icon" href="#"><i class="far fa-edit"></i></a>
                                      <input class="uk-input" type="text" name='descricao' placeholder='Adicionar descrição...' value='{{$gen->descricao}}'>
                                  </div>
                              </div>

                              <div class="uk-margin">
                                <div uk-form-custom="target: > * > span:first-child">
                                      <select name='equipamento' required>
                                        <option value=''>Add. equipamento</option>
                                        <option value='monitor'>Monitor</option>
                                        <option value='notebook_1'>Notebook 1</option>
                                        <option value='notebook_2'>Notebook 2</option>
                                        <option value='microfone'>Microfone</option>
                                      </select>
                                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                                        <span></span>
                                    </button>
                                </div>
                              </div>

                              <div class="uk-margin">
                                <input type='hidden' name='start_date' value='{{$gen->start_date}}' >
                                <input type='hidden' name='end_date' value='{{$gen->end_date}}' >
                                <input type='hidden' name='color' value='{{$gen->color}}'>
                              </div>

                              <button class="uk-button uk-button-default  ">Salvar</button>
                            </form>

                </div>
              </li>
              <li>
                <a class="uk-accordion-title" href="#">Remover</a>
                <div class="uk-accordion-content">
                  <div class="uk-comment-body">
                    <p>Deseja realmente remover ?</p>
                    </div>
                      <p uk-margin>
                        <a class="uk-button uk-button-danger" onclick='removerEvento({{$gen->id}});' href='javascript:function'>Remover</a>
                      </p>
                    </div>
              </li>
            </ul>
          </div>
        </div>
      @endforeach

  <div class="uk-text-center" uk-grid="masonry: true">
      <div class='uk-width-1-6@m uk-margin-left uk-margin-large-top' style="height: 400px;">
          <ul class="uk-nav uk-nav-default uk-width-expand@m">
            <!-- <li class="uk-nav-header"></li>
            <li class="uk-nav-divider"></li> -->
              <div class='uk-width-expand@m'>
                <form>
                    <div class="uk-margin">
                        <div class="uk-inline">
                            <a class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: search"></a>
                            <input class="uk-input" type="search">
                        </div>
                    </div>
                </form>

                <div class='uk-panel uk-panel-scrollable' style='position: relative; resize: none; height: 400px; width: 210px;'>
                    @foreach($agenda as $gen => $value)
                      <div class="uk-margin">    
                        <div class="uk-card agenda-eventos uk-card-default uk-card-body uk-card-small">
                          <span class='agenda-cor-evento uk-position-top-left' style='background-color: {{$value->color}};'></span>
                          <span class='agenda-data-evento uk-position-top-right'>{{$value->start_date}}</span>
                            {{$value->titulo}}
                        </div>
                      </div>
                    @endforeach
                </div>
            </div>
          </ul>
      </div>

      <div class="uk-width-expand@m uk-margin-large-right">
        <div id='calendar' class="uk-height-1-1 uk-margin-top"></div> 
      </div>
  </div>
</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'pt-br',
      plugins: ['interaction', 'dayGrid'],
      selectable: true,
      header: { 
       right: 'prev,next today',
       left: 'title',
      },
      height: 590,
      eventLimit: true,
      eventClick: function(info) {
      var eventObj = info.event;
        $("#desc"+eventObj.id).click();
    },
      events: [
          <?php 
            foreach($agenda as $gen){
          ?>
              {
                id: "<?php echo $gen["id"] ?>",
                title: "<?php echo $gen["titulo"] ?>",
                start: "<?php echo $gen["start_date"] ?>",
                end: "<?php echo $gen["end_date"] ?>",
                backgroundColor: "<?php echo $gen["color"] ?>",
                borderColor: 'transparent',
                textColor: '#fff'
              },
          <?php
            }
          ?>
      ],
      select: function(info) {
        var data = new Date();
        var hora = data.getHours();   // 0-23
        var min  = data.getMinutes(); // 0-59
        var seg  = data.getSeconds();
        var hora_criacao = hora + ':' + min + ':' + seg;

        (async () => {

          const { value: agendar } = await Swal.fire({
            html:
              "<form id='agenda' method='get' action='/AdicionarEvento'>"+
                "<div class='form-group form-agenda'>"+
                  "<input type='text' id='titulo' name='titulo' value='Adicionar titulo...' class='form-control' required>"+
                "</div>"+
                "<div class='form-group form-agenda'>"+
                  "<select name='evento' id='evento' class='form-control' required>"+
                      "<option value=''>Escolha o evento...</option>"+
                      "<option value='mentoria'>Mentoria</option>"+
                      "<option value='eventos'>Eventos</option>"+
                      "<option value='cursos'>Cursos</option>"+
                      "<option value='oficinas'>Oficinas</option>"+
                      "<option value='reunioes'>Reuniões</option>"+
                    "</select>"+
                "</div>"+
                "<div class='form-group form-agenda'>"+
                    "<select name='mentor' id='' class='form-control' required>"+
                      "<option value=''>Adicionar mentor...</option>"+
                      "<option value='luis'>Luiz Eduardo</option>"+
                      "<option value='maruska'>Maruska</option>"+
                      "<option value='marina'>Marina Lecas</option>"+
                      "<option value='diego'>Diego Saulo</option>"+
                    "</select>"+
                "</div>"+
                "<div class='form-group form-agenda'>"+
                  "<select name='local' id='' class='form-control' required>"+
                    "<option value=''>Adicionar local...</option>"+
                    "<option value='sala_1'>Sala 1</option>"+
                    "<option value='sala_2'>Sala 2</option>"+
                    "<option value='sala_3'>Sala 3</option>"+
                    "<option value='launcher'>Launcher</option>"+
                  "</select>"+
                "</div>"+
                "<div class='form-group form-agenda'>"+
                  "<input type='text' name='descricao' value='Adicionar descrição...' class='form-control' required>"+
                "</div>"+
                "<div class='form-group form-agenda'>"+
                  "<select name='equipamento' id='' class='form-control' required>"+
                      "<option value=''>Adicionar equipamento...</option>"+
                      "<option value='monitor'>Monitor</option>"+
                      "<option value='notebook_1'>Notebook 1</option>"+
                      "<option value='notebook_2'>Notebook 2</option>"+
                      "<option value='microfone'>Microfone</option>"+
                    "</select>"+
                  "</div>"+
                  "<div class='form-group'>"+
                      "<input type='hidden' name='start_date' value='"+info.startStr+"' >"+
                      "<input type='hidden' name='end_date' value='"+info.endStr+"' >"+
                      "<input type='hidden' name='color'>"+
                      "<input type='hidden' name='hora_criacao' value='"+hora_criacao+"' >"+
                  "</div>"+
                    "<input type='submit' class='btn btn-primary' value='Salvar'>"+
                "</form>",
              showConfirmButton: false
          })

        })()
       
      }
  });
  calendar.render();
});

function removerEvento(id){
  window.location.href = "/RemoverEvento/"+id;
}
function pesquisaAgenda(){
    document.forms['formSearchAgenda'].submit();
}
</script>
</html>