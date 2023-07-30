<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use App\Models\Restaurantes;
use Illuminate\Http\Request;

class RestaurantesController extends Controller{
    /**
     * @OA\Get(
     *     path="/restaurantes",
     *     summary="Lista de restaurantes",
     *     operationId="listRestaurantes",
     *     tags={"restaurantes"},
     *     @OA\Response(
     *         response=200,
     *         description="Un array de restaurantes",
     *         @OA\JsonContent(ref="#/components/schemas/Restaurantes"),
     *         @OA\Header(header="x-next", @OA\Schema(type="string"), description="A link to the next page of responses")
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="unexpected error",
     *         @OA\JsonContent(ref="#/components/schemas/Error")
     *     )
     * )
     */
    public function index(){
        $restaurantes = Restaurantes::all();
        return response()->json($restaurantes);
    }

    /**
     * @OA\Get(
     *    path="/restaurantes/{id}",
     *   summary="Obtener restaurante por id",
     * operationId="getRestauranteById",
     * tags={"restaurantes"},
     * @OA\Parameter(
     *   description="ID del restaurante",
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
     * description="Un restaurante",
     * @OA\Schema(ref="#/components/schemas/Restaurantes")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     */
    public function show($id){
        $restaurante = Restaurantes::find($id);
        return response()->json($restaurante);
    }

    /**
     * @OA\Post(
     * path="/restaurantes",
     * summary="Crear un restaurante",
     * operationId="createRestaurante",
     * tags={"restaurantes"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Datos del restaurante",
     *    @OA\JsonContent(ref="#/components/schemas/Restaurantes")
     * ),
     * @OA\Response(
     * response=200,
     * description="Un restaurante",
     * @OA\Schema(ref="#/components/schemas/Restaurantes")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     */
    public function store(Request $request){
        $restaurante = Restaurantes::create($request->all());
        return response()->json($restaurante);
    }

    /**
     * @OA\Put(
     * path="/restaurantes/{id}",
     * summary="Actualizar un restaurante",
     * operationId="updateRestaurante",
     * tags={"restaurantes"},
     * @OA\Parameter(
     *   description="ID del restaurante",
     * in="path",
     * name="id",
     * required=true,
     * @OA\Schema(
     * type="integer",
     * format="int64"
     * )
     * ),
     * @OA\RequestBody(
     *    required=true,
     *    description="Datos del restaurante",
     *    @OA\JsonContent(ref="#/components/schemas/Restaurantes")
     * ),
     * @OA\Response(
     * response=200,
     * description="Un restaurante",
     * @OA\Schema(ref="#/components/schemas/Restaurantes")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     */
    public function update(Request $request, $id){
        $restaurante = Restaurantes::findOrFail($id);
        $restaurante->update($request->all());
        return response()->json($restaurante);
    }

    /**
     * @OA\Delete(
     * path="/restaurantes/{id}",
     * summary="Eliminar un restaurante",
     * operationId="deleteRestaurante",
     * tags={"restaurantes"},
     * @OA\Parameter(
     *   description="ID del restaurante",
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
     * description="Un restaurante",
     * @OA\Schema(ref="#/components/schemas/Restaurantes")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     */
    public function delete($id){
        $restaurante = Restaurantes::findOrFail($id);
        $restaurante->delete();
        return response()->json($restaurante);
    }
}
