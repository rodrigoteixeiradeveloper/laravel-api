<?php

namespace App\Http\Controllers;

use App\Http\Resources\LivroResource;
use App\Http\Resources\LivrosCollection;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Livro::with('testamento', 'versiculos')->paginate(1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if(Livro::create($request->all())) {
            return response()->json(
                [
                    'message' => 'Livro cadastrado com sucesso!'
                ], 201
            );
        }

        return response()->json(
            [
                'message' => 'Erro ao cadastrar livro!'
            ], 404
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($livro)
    {
        $livro = Livro::find($livro);

        //Storage::disk('public')->url($livro->capa);

        if($livro) {

            //$livro->testamento;
            //$livro->versiculos;

            return new LivroResource($livro);
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
     * @param  int  $livro
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $livro)
    {
        $livro = Livro::find($livro);

        if($livro){
            $livro->update($request->all());

            return $livro;
        }

        return response()->json(
            [
                'message' => 'Livro não encontrado!'
            ], 404
        );
    }


    public function upload(Request $request, $livro)
    {
        $path = $request->capa->store('livros', 'public');

        $livro = Livro::find($livro);
        if($livro){
            $livro->capa = $path;

            if($livro->save())
                return $livro;

            return response()->json(
                [
                    'message' => 'Erro on save image!'
                ], 404
            );
        }

        return response()->json(
            [
                'message' => 'Not found!'
            ], 404
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($livro)
    {
        if(Livro::destroy($livro)){
            return response()->json(
                [
                    'message' => 'Livro excluído com sucesso!'
                ], 200
            );
        }

        return response()->json(
            [
                'message' => 'Livro não encontrado!'
            ], 404
        );
    }
}
