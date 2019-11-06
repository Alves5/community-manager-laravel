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
    
    public function adicionar(Request $request){
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
                $data['color'] = '#AEFB49';
            break;
            case 'eventos':
                $data['color'] = '#FF7171';
            break;
            case 'cursos':
                $data['color'] = '#D67BFC';
            break;
            case 'oficinas':
                $data['color'] = '#65E9FF';
            break;
            case 'reunioes':
                $data['color'] = '#FFD23D';
            break;
        }
        Agenda::create($data);
        return back();
    }

}
