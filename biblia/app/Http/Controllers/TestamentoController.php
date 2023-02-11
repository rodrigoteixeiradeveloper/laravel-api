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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if(Testamento::create($request->all())) {
            return response()->json(
                [
                    'message' => 'Testamento cadastrado com sucesso!'
                ], 201
            );
        }

        return response()->json(
            [
                'message' => 'Erro ao cadastrar Testamento!'
            ], 404
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $testamento
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($testamento)
    {
        $testamento = Testamento::find($testamento);
        if($testamento) {

            $testamento->livros;

            return $testamento;
        }

        return response()->json(
            [
                'message' => 'Livro não encontrado!'
            ], 404
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $testamento
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $testamento)
    {
        $testamento = Testamento::find($testamento);

        if($testamento){
            $testamento->update($request->all());

            return $testamento;
        }

        return response()->json(
            [
                'message' => 'Testamento não encontrado!'
            ], 404
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($testamento)
    {
        if(Testamento::destroy($testamento)){
            return response()->json(
                [
                    'message' => 'Testamento excluído com sucesso!'
                ], 200
            );
        }
        return response()->json(
            [
                'message' => 'Testamento não encontrado!'
            ], 404
        );
    }
}
