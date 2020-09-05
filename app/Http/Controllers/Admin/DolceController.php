<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dolce;
use App\Models\Ingredienti;

class DolceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dolci = Dolce::latest()->paginate(10);
        return view('admin.dolci.index',compact('dolci'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $ingredienti = Ingredienti::orderBy('nome', 'asc')->get();
        return view('admin.dolci.create',compact('ingredienti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $dolce = new Dolce;
        $dolce->nome = $request->nome;
        $dolce->prezzo = $request->prezzo;
        $dolce->qta = $request->qta;

        try {
            $dolce->save();
        } catch (\Exception $e) {
            $code = $e->getCode();
            $message =  $e->getMessage();
            return redirect()->route('admin.dolci.index')->withErrors(['error' => $message]);
        }

        return redirect()->route('admin.dolci.index')->withMessage('Dolce creato con successo.');

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

    public function edit(Dolce $dolce)
    {
        $dolce = Dolce::findOrFail($dolce->id);
        $ingredienti = Ingredienti::all();

        $ingredienti_selezionati = $dolce->ingredienti->toarray();
        $n = count($ingredienti_selezionati);
        $id_selezionati_ingredienti = [];

        if($n > 0){
            for($x=0; $x<$n; $x++){
                $id_selezionati_ingredienti[] = $ingredienti_selezionati[$x]['id'];
            }
        }
       

        //dd($ingredienti);
        return view('admin.dolci.edit', compact('dolce','ingredienti','id_selezionati_ingredienti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Dolce $dolce)
    {
        //dd($request->ingredienti);
        $dolce->nome = $request->nome;
        $dolce->prezzo = $request->prezzo;
        $dolce->qta = $request->qta;

        try {
            $dolce->save();
            $dolce->ingredienti()->detach();
            $dolce->ingredienti()->attach($request->ingredienti);

        } catch (\Exception $e) {
            $code = $e->getCode();
            $message =  $e->getMessage();
            return redirect()->route('admin.dolci.index')->withErrors(['error' => $message]);
        }

        return redirect()->route('admin.dolci.index')->withMessage('Dolce aggiornato con successo.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Dolce $dolce)
    {
        $dolce->delete();
        return redirect()->route('admin.dolci.index')->withMessage('Dolce eliminato con successo.');
    }
}
