<?php

namespace App\Http\Controllers;

use App\Models\Traducao;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TraducaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(
            [
                'traducoes' => Traducao::all()
            ], 200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $traducao = Traducao::create($request->all());
        if($traducao) {
            return response()->json(
                [
                    '$traducao' => $traducao,
                    'message' => 'Item cadastrado com sucesso!'
                ], 201
            );
        }

        return response()->json(
            [
                'message' => 'Erro ao cadastrar item!'
            ], 404
        );
    }

    /**
     * Display the specified resource.
     *
     * @param $traducao
     * @return JsonResponse
     */
    public function show($traducao): JsonResponse
    {
        $traducao = Traducao::find($traducao);
        if($traducao) {

            $traducao->idioma;

            return response()->json(
                [
                    '$traducao' => $traducao,
                ], 200
            );
        }

        return response()->json(
            [
                'message' => 'Item não encontrado!'
            ], 404
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $traducao
     * @return JsonResponse
     */
    public function update(Request $request, $traducao): JsonResponse
    {
        $traducao = Traducao::find($traducao);
        if($traducao){
            $traducao->update($request->all());

            return response()->json(
                [
                    '$traducao' => $traducao,
                ], 200
            );
        }

        return response()->json(
            [
                'message' => 'Item não encontrado!'
            ], 404
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $traducao
     * @return JsonResponse
     */
    public function destroy($traducao): JsonResponse
    {
        if(Traducao::destroy($traducao)){
            return response()->json(
                [
                    'message' => 'Item excluído com sucesso!'
                ], 200
            );
        }

        return response()->json(
            [
                'message' => 'Item não encontrado!'
            ], 404
        );
    }
}
