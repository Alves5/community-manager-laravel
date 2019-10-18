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
        return back()->with('success', 'Dados salvos com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DadosMentoresMembros  $dadosMentoresMembros
     * @return \Illuminate\Http\Response
     */
    public function show(DadosMentoresMembros $dadosMentoresMembros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DadosMentoresMembros  $dadosMentoresMembros
     * @return \Illuminate\Http\Response
     */
    public function edit(DadosMentoresMembros $dadosMentoresMembros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DadosMentoresMembros  $dadosMentoresMembros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DadosMentoresMembros $dadosMentoresMembros)
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
