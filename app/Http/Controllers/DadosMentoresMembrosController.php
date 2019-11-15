<?php

namespace App\Http\Controllers;

use App\DadosMentoresMembros;
use Illuminate\Http\Request;

class DadosMentoresMembrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = DadosMentoresMembros::latest()->paginate(5);
        return view('dadosMentoresMembros.index', compact('dados'))
                ->with('i', (request()->input('page', 1) -1)*5);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'dataNasc' => 'required',
            'especializacao' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'redesSociais' => 'required',
            'sobre' => 'required'
        ]);
        DadosMentoresMembros::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DadosMentoresMembros  $dadosMentoresMembros
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = DadosMentoresMembros::find($id);
        return view('dadosMentoresMembros.edit', compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DadosMentoresMembros  $dadosMentoresMembros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'dataNasc' => 'required',
            'especializacao' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'redesSociais' => 'required',
            'sobre' => 'required'
        ]);
        $dados = DadosMentoresMembros::find($id);
        $dados->nome = $request->get('nome');
        $dados->dataNasc = $request->get('dataNasc');
        $dados->especializacao = $request->get('especializacao');
        $dados->telefone = $request->get('telefone');
        $dados->endereco = $request->get('endereco');
        $dados->redesSociais = $request->get('redesSociais');
        $dados->sobre = $request->get('sobre');
        $dados->save();
        return redirect()->route('dadosMentoresMembros.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DadosMentoresMembros  $dadosMentoresMembros
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DadosMentoresMembros $dadosMentoresMembros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DadosMentoresMembros  $dadosMentoresMembros
     * @return \Illuminate\Http\Response
     */
    public function destroy(DadosMentoresMembros $dadosMentoresMembros)
    {
        //
    }
}
