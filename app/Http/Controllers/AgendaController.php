<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller
{
    public function index(){
     
            return view('agenda.index');
    }
    
    public function adicionar(Request $request){
     
    }
}
