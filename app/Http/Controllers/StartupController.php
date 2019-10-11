<?php

namespace App\Http\Controllers;

use App\Startup;
use App\Rules\Uppercase;
use Illuminate\Http\Request;

class StartupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startups = Startup::latest()->where('ativo', true)->paginate(5);
        return view('startup.index', compact('startups'))
                ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('startup.create');
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
            'nome' => 'required|max: 20',
            'email' => 'required|email',
            'senha' => 'required|between:6,12'//Depois colocar o new Uppercase aqui
        ]);
        Startup::create($request->all());
            return redirect()->route('startup.index')
                    ->with('success', 'Nova startup adicionada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $startup = Startup::find($id);  
        return view('startup.detail', compact('startup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $startup = Startup::find($id);
        return view('startup.edit', compact('startup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max: 20',
            'email' => 'required|email',
            'senha' => 'required|between:6,12'
        ]);
        $startup = Startup::find($id);
        $startup->nome = $request->get('nome');
        $startup->email = $request->get('email');
        $startup->senha = $request->get('senha');
        $startup->save();
        return redirect()->route('startup.index')
                ->with('success', 'Os dados foram atualizados!');
    }

    //Pegar as informações que vão vir do alert de confirmação
    public function inativar(Request $request, $id)
    {
        $startup = Startup::find($id);
        $startup->ativo = $request->get('ativo');
        $startup->save();
        return redirect()->route('startup.index')
                ->with('success', 'Startup inativada com sucesso.');
    }

    /**
     * Remove uma Startup.
     *
     * @param  \App\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $startup = Startup::find($id);
        $startup->ativo = $request->get('ativo');
        $startup->delete();
        return redirect()->route('startup.index')
                ->with('success', 'A startup foi removida.');
    }
}
