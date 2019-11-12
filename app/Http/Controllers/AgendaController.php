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
