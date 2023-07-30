<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;


class UsuariosController extends Controller
{
    /**
     * @OA\Get(
     *     path="/usuarios",
     *     summary="Lista de usuarios",
     *     operationId="listUsuarios",
     *     tags={"usuarios"},
     *     @OA\Response(
     *         response=200,
     *         description="Un array de usuarios",
     *         @OA\JsonContent(ref="#/components/schemas/Usuarios"),
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
        $usuarios = Usuarios::all();
        return response()->json($usuarios);
    }

    /**
     * @OA\Get(
     *    path="/usuarios/{id}",
     *   summary="Obtener usuario por id",
     * operationId="getUsuarioById",
     * tags={"usuarios"},
     * @OA\Parameter(
     *   description="ID del usuario",
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
     * description="Un usuario",
     * @OA\Schema(ref="#/components/schemas/Usuarios")
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
        $usuario = Usuarios::find($id);
        return response()->json($usuario);
    }

    /**
     * @OA\Post(
     * path="/usuarios",
     * summary="Crear un usuario",
     * operationId="createUsuario",
     * tags={"usuarios"},
     * @OA\RequestBody(
     * description="Usuario a crear",
     * required=true,
     * @OA\JsonContent(ref="#/components/schemas/Usuarios")
     * ),
     * @OA\Response(
     * response=200,
     * description="Un usuario",
     * @OA\JsonContent(ref="#/components/schemas/Usuarios")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     *
     */
    public function store(Request $request){
        $usuario = Usuarios::create($request->all());
        return response()->json($usuario);
    }

    /**
     * @OA\Put(
     * path="/usuarios/{id}",
     * summary="Actualizar un usuario",
     * operationId="updateUsuario",
     * tags={"usuarios"},
     * @OA\Parameter(
     * description="ID del usuario",
     * in="path",
     * name="id",
     * required=true,
     * @OA\Schema(
     * type="integer",
     * format="int64"
     * )
     * ),
     * @OA\RequestBody(
     * description="Usuario a actualizar",
     * required=true,
     * @OA\JsonContent(ref="#/components/schemas/Usuarios")
     * ),
     * @OA\Response(
     * response=200,
     * description="Un usuario",
     * @OA\JsonContent(ref="#/components/schemas/Usuarios")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id){
        $usuario = Usuarios::find($id);
        $usuario->update($request->all());
        return response()->json($usuario);
    }

    /**
     * @OA\Delete(
     * path="/usuarios/{id}",
     * summary="Eliminar un usuario",
     * operationId="deleteUsuario",
     * tags={"usuarios"},
     * @OA\Parameter(
     * description="ID del usuario",
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
     * description="Un usuario",
     * @OA\JsonContent(ref="#/components/schemas/Usuarios")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     *
     */
    public function destroy($id){
        $usuario = Usuarios::find($id);
        $usuario->delete();
        return response()->json($usuario);
    }
}
