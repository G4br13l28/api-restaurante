<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurantes;
use App\Models\Platos;

class PlatosController extends Controller{

    /**
     * @OA\Get(
     *    path="/platos",
     *  summary="Obtener lista de platos",
     * operationId="getPlatosList",
     * tags={"platos"},
     * @OA\Response(
     * response=200,
     * description="Lista de platos",
     * @OA\JsonContent(ref="#/components/schemas/Platos")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     *
     */
    public function index(){
        $platos = Platos::all();
        return response()->json($platos);
    }

    /**
     * @OA\Get(
     *   path="/platos/{id}",
     *  summary="Obtener plato por id",
     * operationId="getPlatoById",
     * tags={"platos"},
     * @OA\Parameter(
     *  description="ID del plato",
     * in="path",
     * name="id",
     * required=true,
     * @OA\Schema(
     * type="integer",
     * format="int64"
     * )
     * ),
     * @OA\Response(
     * response=200,
     * description="Un plato",
     * @OA\Schema(ref="#/components/schemas/Platos")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     *
     */
    public function show($id){
        $plato = Platos::find($id);
        return response()->json($plato);
    }

    /**
     * @OA\Post(
     *  path="/platos",
     * summary="Crear un nuevo plato",
     * operationId="createPlato",
     * tags={"platos"},
     * @OA\RequestBody(
     *   required=true,
     *  description="Datos del plato",
     * @OA\JsonContent(ref="#/components/schemas/Platos")
     * ),
     * @OA\Response(
     * response=200,
     * description="Un plato",
     * @OA\JsonContent(ref="#/components/schemas/Platos")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     */
    public function store(Request $request){
        $plato = Platos::create($request->all());
        return response()->json($plato);
    }

    /**
     * @OA\Put(
     * path="/platos/{id}",
     * summary="Actualizar un plato",
     *  operationId="updatePlato",
     * tags={"platos"},
     * @OA\Parameter(
     * description="ID del plato",
     * in="path",
     * name="id",
     * required=true,
     * @OA\Schema(
     * type="integer",
     * format="int64"
     * )
     * ),
     * @OA\RequestBody(
     * required=true,
     * description="Datos del plato",
     * @OA\JsonContent(ref="#/components/schemas/Platos")
     * ),
     * @OA\Response(
     * response=200,
     * description="Un plato",
     * @OA\JsonContent(ref="#/components/schemas/Platos")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     *
     */
    public function update(Request $request, $id){
        $plato = Platos::find($id);
        $plato->update($request->all());
        return response()->json($plato);
    }

    /**
     * @OA\Delete(
     * path="/platos/{id}",
     * summary="Eliminar un plato",
     * operationId="deletePlato",
     * tags={"platos"},
     * @OA\Parameter(
     * description="ID del plato",
     * in="path",
     * name="id",
     * required=true,
     * @OA\Schema(
     * type="integer",
     * format="int64"
     * )
     * ),
     * @OA\Response(
     * response=200,
     * description="Un plato",
     *  @OA\JsonContent(ref="#/components/schemas/Platos")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     *
     */
    public function destroy($id){
        $plato = Platos::find($id);
        $plato->delete();
        return response()->json($plato);
    }
}
