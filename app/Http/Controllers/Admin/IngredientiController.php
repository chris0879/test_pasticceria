<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ingredienti;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\IngredientiRequest;
use App\Http\Controllers\Controller;

class IngredientiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredienti = Ingredienti::orderBy('nome', 'asc')->paginate(10);
        return view('admin.ingredienti.index',compact('ingredienti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ingredienti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredientiRequest $request)
    {
        $ingrediente = new Ingredienti();
        $ingrediente->nome = $request->nome;

        try {
            $ingrediente->save();
        } catch (\Exception $e) {
            $code = $e->getCode();
            $message =  $e->getMessage();
            return redirect()->route('admin.ingredienti.index')->withErrors(['error' => $message]);
        }

        return redirect()->route('admin.ingredienti.index')->withMessage('Ingrediente creato con successo.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredienti $ingredienti)
    {
        $ingrediente = Ingredienti::findOrFail($ingredienti->id);
        return view('admin.ingredienti.edit', compact('ingrediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(IngredientiRequest $request, Ingredienti $ingredienti)
    {
       
        $ingredienti->nome = $request->nome;

        try {
            $ingredienti->save();
        } catch (\Exception $e) {
            $code = $e->getCode();
            $message =  $e->getMessage();
            return redirect()->route('admin.ingredienti.index')->withErrors(['error' => $message]);
        }

        return redirect()->route('admin.ingredienti.index')->withMessage('Ingrediente aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Ingredienti $ingredienti)
    {
        //$ingredienti->delete();
        $ingredienti->forceDelete();
        return redirect()->route('admin.ingredienti.index')->withMessage('Ingrediente eliminato con successo.');
    }
}
