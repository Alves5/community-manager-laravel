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
            'color' => 'required'
        ]);

        Agenda::create($request->all());
        return back();
    }

}
