<?php

namespace App\Http\Controllers;

use App\Models\Versiculo;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Versiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Versiculo::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function show($versiculo)
    {
        return Versiculo::findOrFail($versiculo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $versiculo)
    {
        $versiculo = Versiculo::findOrFail($versiculo);

        $versiculo->update($request->all());

        return $versiculo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($versiculo)
    {
        return Versiculo::destroy($versiculo);
    }
}
