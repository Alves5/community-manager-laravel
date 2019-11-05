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
                $data['color'] = '#C9FF81';
            break;
            case 'eventos':
                $data['color'] = '#FFA1A1';
            break;
            case 'cursos':
                $data['color'] = '#E8B2FF';
            break;
            case 'oficinas':
                $data['color'] = '#B2F7FF';
            break;
            case 'reunioes':
                $data['color'] = '#FF0F74';
            break;
        }
        Agenda::create($data);
        return back();
    }

}
