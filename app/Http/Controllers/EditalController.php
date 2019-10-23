<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edital;

class EditalController extends Controller
{
    public function index(){
        $edital = Edital::all();
        return view('edital.index', compact('edital'));
    }

    public function inserir(Request $request){
        $request->validate([
            'titulo' => 'required|string',
            'descricao' => 'required|string',
            'link' => 'required|string'
        ]);

        Edital::create($request->all());
        return back();
    }

    public function detailEdital($id){
        $edital = Edital::find($id);
        return view('edital.detail', compact('edital'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'titulo' => 'required|string',
            'descricao' => 'required|string',
            'link' => 'required|string'
        ]);
        $edital = Edital::find($id);
        $edital->titulo = $request->get('titulo');
        $edital->descricao = $request->get('descricao');
        $edital->link = $request->get('link');
        $edital->save();
        return back();
    }

    public function remove($id){
        $edital = Edital::find($id);
        $edital->delete();
        return redirect()->route('show');
    }
}
