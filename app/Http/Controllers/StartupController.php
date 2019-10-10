<?php

namespace App\Http\Controllers;

use App\Startup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StartupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startups = Startup::latest()->paginate(5);
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
            'nome' => 'required|max: 20', 'required|string',
            'email' => 'required|max: 100', 'email',
            'senha' => 'required|min: 6', 'string'
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
            'nome' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:startup'],
            'senha' => ['required', 'string', 'min:6', 'max:12', 'confirmed']
        ]);
        $startup = Startup::find($id);
        $startup->nome = $request->get('nome');
        $startup->email = $request->get('email');
        $startup->senha = $request->get('senha');
        $startup->save();
        return redirect()->route('startup.index')
                ->with('success', 'Os dados foram atualizados!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $startup = Startup::find($id);
        $startup->delete();
        return redirect()->route('startup.index')
                ->with('success', 'A pessoa foi removida!');
    }
}
