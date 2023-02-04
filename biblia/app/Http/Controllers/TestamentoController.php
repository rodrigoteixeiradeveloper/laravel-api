<?php

namespace App\Http\Controllers;

use App\Models\Testamento;
use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Testamento::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Testamento::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function show($testamento)
    {
        return Testamento::findOrFail($testamento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $testamento)
    {
        $testamento = Testamento::findOrFail($testamento);

        $testamento->update($request->all());

        return $testamento;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($testamento)
    {
        return Testamento::destroy($testamento);
    }
}
