<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(
            [
                'idiomas' => Idioma::all()
            ],  200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $idioma = Idioma::create($request->all());
        if($idioma) {
            return response()->json(
                [
                    'idioma' => $idioma,
                    'message' => 'Idioma cadastrado com sucesso!'
                ], 201
            );
        }

        return response()->json(
            [
                'message' => 'Erro ao cadastrar idioma!'
            ], 404
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idioma
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($idioma)
    {
        $idioma = Idioma::find($idioma);
        if($idioma) {

            $idioma->traducoes;

            return response()->json(
                [
                    'idioma' => $idioma,
                ], 200
            );
        }

        return response()->json(
            [
                'message' => 'Idioma não encontrado!'
            ], 404
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idioma
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $idioma)
    {
        $idioma = Idioma::find($idioma);
        if($idioma){
            $idioma->update($request->all());

            return response()->json(
                [
                    'idioma' => $idioma,
                ], 200
            );
        }

        return response()->json(
            [
                'message' => 'Idioma não encontrado!'
            ], 404
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idioma
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($idioma)
    {
        if(Idioma::destroy($idioma)){
            return response()->json(
                [
                    'message' => 'Idioma excluído com sucesso!'
                ], 200
            );
        }

        return response()->json(
            [
                'message' => 'Idioma não encontrado!'
            ], 404
        );
    }
}
