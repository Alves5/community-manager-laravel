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


    <link href="{{ asset('css/fullCalendar/core-main.css') }}" rel='stylesheet' />
    <link href="{{ asset('css/fullCalendar/day-main.css') }}" rel='stylesheet' />

    <script src="{{ asset('js/fullCalendar/core-main.js') }}"></script>
    <script src="{{ asset('js/fullCalendar/inte-main.js') }}"></script>
    <script src="{{ asset('js/fullCalendar/day-main.js') }}"></script>
    <script src="{{ asset('js/fullCalendar/pt-br.js') }}"></script>
  </head>
  <body>
      <div class="container">
        <div class="row">
          <div id='calendar' class="col-md-10 offset-md-1"></div>
        </div>
      </div>
</body>
<script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'pt-br',
      plugins: [ 'interaction', 'dayGrid', 'timeGrid'],
      header: {
        left: 'prev, next today',
        center: 'title',
        right: 'listDay,listWeek,month'
      },
      selectable: true,
      editable: true,
      eventLimit: true,
      select: function(info) {
        (async () => {

          const { value: agendar } = await Swal.fire({
            html:
              "<form id='agenda' method='post' action='{{url('/AdicionarEvento')}}'>"+
                "<div class='form-group form-agenda'>"+
                  "<input type='text' id='titulo' name='titulo' value='Adicionar titulo...' class='form-control' required>"+
                "</div>"+
                "<div class='form-group form-agenda'>"+
                  "<select name='evento' id='evento' class='form-control'>"+
                      "<option value=''>Escolha o evento...</option>"+
                      "<option value='mentoria'>Mentoria</option>"+
                      "<option value='palestra'>Palestra</option>"+
                      "<option value='reuniao'>Reunião</option>"+
                      "<option value='simposio'>Simpósio</option>"+
                    "</select>"+
                "</div>"+
                "<div class='form-group form-agenda'>"+
                    "<select name='mentor' id='' class='form-control'>"+
                      "<option value=''>Adicionar mentor...</option>"+
                      "<option value='luis'>Luiz Eduardo</option>"+
                      "<option value='maruska'>Maruska</option>"+
                      "<option value='marina'>Marina Lecas</option>"+
                      "<option value='diego'>Diego Saulo</option>"+
                    "</select>"+
                "</div>"+
                "<div class='form-group form-agenda'>"+
                  "<select name='local' id='' class='form-control'>"+
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
                  "<select name='equipamentos' id='' class='form-control'>"+
                      "<option value='>Adicionar equipamento...</option>"+
                      "<option value='monitor'>Monitor</option>"+
                      "<option value='notebook_1'>Notebook 1</option>"+
                      "<option value='notebook_2'>Notebook 2</option>"+
                      "<option value='microfone'>Microfone</option>"+
                    "</select>"+
                  "</div>"+
                  "<div class='form-group'>"+
                    "<label>"+info.startStr + ' - ' + info.endStr+"</label>"+
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

</script>
</html>