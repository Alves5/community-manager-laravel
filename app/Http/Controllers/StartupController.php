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

   //Adiciona Startup
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

   //Inativa Startup
    public function show($id)
    {
        $startup = Startup::find($id);
        if($startup->ativo == 0)
        {
            $startup->ativo = 1;
        }
        else
        {
            $startup->ativo = 0;
        }
        $startup->save();
        return redirect()->back();
    }


   //Reativa Startup
    // public function update($id)
    // {
    //     $startup = Startup::find($id);
    //     $startup->ativo = 1;
    //     $startup->save();
    //     return redirect()->back();
    // }

   //Remove Startup
    public function destroy($id)
    {
        $startup = Startup::find($id);
        $startup->delete();
        return redirect()->route('startup.index')
                ->with('success', 'A startup foi removida.');
    }
}
