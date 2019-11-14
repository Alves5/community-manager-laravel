<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller
{
    public function index(){
        $agenda = Agenda::all();
        return view('agenda.index', compact('agenda'));
    }
    
    public function searchAgenda(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->get('query');
            if($query != ' ')
            {
                $data = Agenda::where('titulo', 'LIKE', '%'.$query.'%')
                                ->orWhere('evento', 'LIKE', '%'.$query.'%')
                                ->orWhere('mentor', 'LIKE', '%'.$query.'%')
                                ->orWhere('local', 'LIKE', '%'.$query.'%')
                                ->orWhere('descricao', 'LIKE', '%'.$query.'%')
                                ->orWhere('equipamento', 'LIKE', '%'.$query.'%')
                                ->orWhere('start_date', 'LIKE', '%'.$query.'%')->get();
            }
            else
            {
                $data = Agenda::orderBy('id', 'desc')->get();
            }
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row => $value){
                    $output .= "
                      <div class='uk-margin'>    
                        <div class='uk-card agenda-eventos uk-card-default uk-card-body uk-card-small'>
                          <span class='agenda-cor-evento uk-position-top-left' style='background-color: {{$value->color}};'></span>
                          <span id='#desc{{$value->id}}' uk-toggle='target: #offcanvas-flip{{$value->id}}' class='agenda-mais-evento uk-position-top-right'><i class='fas fa-ellipsis-h'></i></span>
                            {{$value->titulo}}
                        </div>
                      </div>
                    ";
                }
            }
            else{
                $output .= "
                      <div class='uk-margin'>    
                        <p>Nada encontrado!</p>
                      </div>
                    ";
            }
            $data = array(
                'table_data' => $output
            );
            echo json_encode($data);
        }
    }

    public function insert(Request $request){
        $request->validate([
            'titulo' => 'required',
            'evento' => 'required',
            'mentor' => 'required',
            'local' => 'required',
            'descricao' => 'required',
            'equipamento' => 'required',
        ]);

        $data = $request->all();   
        switch($request->evento){
            case 'mentoria':
                $data['color'] = '#84E600';
            break;
            case 'eventos':
                $data['color'] = '#FF7171';
            break;
            case 'cursos':
                $data['color'] = '#D67BFC';
            break;
            case 'oficinas':
                $data['color'] = '#24CBFF';
            break;
            case 'reunioes':
                $data['color'] = '#FFD23D';
            break;
        }
        Agenda::create($data);
        return back();
    }

    public function update(Request $request, $id){
        $request->validate([
            'titulo' => 'required',
            'evento' => 'required',
            'mentor' => 'required',
            'local' => 'required',
            'descricao' => 'required',
            'equipamento' => 'required',
        ]);

        $data = $request->all();
        switch($request->evento){
            case 'mentoria':
                $data['color'] = '#84E600';
            break;
            case 'eventos':
                $data['color'] = '#FF7171';
            break;
            case 'cursos':
                $data['color'] = '#D67BFC';
            break;
            case 'oficinas':
                $data['color'] = '#24CBFF';
            break;
            case 'reunioes':
                $data['color'] = '#FFD23D';
            break;
        }
        if ($request->privado == 0) {
            $data['privado'] = 0;
        }else{
            $data['privado'] = 1;
        }

        $agenda = Agenda::find($id);
        $agenda->titulo = $data['titulo'];
        $agenda->evento = $data['evento'];
        $agenda->mentor = $data['mentor'];
        $agenda->local = $data['local'];
        $agenda->descricao = $data['descricao'];
        $agenda->equipamento = $data['equipamento'];
        $agenda->start_date = $data['start_date'];
        $agenda->end_date = $data['end_date'];
        $agenda->color = $data['color'];
        $agenda->privado = $data['privado'];
        $agenda->save();
        return back();
    }
    public function remove($id){
        $agenda = Agenda::find($id);
        $agenda->delete();
        return back();
    }

}
