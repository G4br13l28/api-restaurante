<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\DetallePedidos;

class PedidosController extends Controller{
    /**
     * @OA\Get(
     *     path="/pedidos",
     *     summary="Lista de pedidos",
     *     operationId="listPedidos",
     *     tags={"pedidos"},
     *     @OA\Response(
     *         response=200,
     *         description="Un array de pedidos",
     *         @OA\JsonContent(ref="#/components/schemas/PedidosSchema"),
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
        $pedidos = Pedidos::all();
        return response()->json($pedidos);
    }

    /**
     * @OA\Get(
     *    path="/pedidos/{id}",
     *    summary="Obtener pedido por id",
    *     operationId="getPedidoById",
     *    tags={"pedidos"},
     *    @OA\Parameter(
     *      description="ID del pedido",
     *      in="path",
     *      name="id",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      )
     *    ),
     *    @OA\Response(
     *      response=200,
     *      description="Obtener un pedido por su ID",
     *      @OA\JsonContent(ref="#/components/schemas/PedidosSchema")
     *    ),
     *    @OA\Response(
     *      response="default",
     *      description="unexpected error",
     *      @OA\JsonContent(ref="#/components/schemas/Error")
     *    )
     * )
     */
    public function show($id){
        //$pedido = Pedidos::find($id);
        // Obtener el pedido por su ID
        $pedido = Pedidos::find($id);

        // Verificar si el pedido existe
        if (!$pedido) {
            return response()->json(['mensaje' => 'Pedido no encontrado'], 404);
        }

        // Obtener los detalles del pedido asociados al ID del pedido
        $detallesPedido = DetallePedidos::where('id_pedido', $id)->get();

        // Verificar si el pedido tiene detalles
        if (count($detallesPedido) == 0) {
            return response()->json(['mensaje' => 'El pedido no tiene detalles'], 404);
        }

        // Agregar los detalles al pedido
        $pedido->detalle = $detallesPedido;

        return response()->json($pedido);
    }

    /**
     * @OA\Post(
     * path="/pedidos",
     * summary="Crear un pedido",
     * operationId="createPedido",
     * tags={"pedidos"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Datos del pedido",
     *    @OA\JsonContent(ref="#/components/schemas/PedidosSchema")
     * ),
     * @OA\Response(
     * response=200,
     * description="Un pedido",
     * @OA\JsonContent(ref="#/components/schemas/PedidosSchema")
     * ),
     * @OA\Response(
     * response="default",
     * description="unexpected error",
     * @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     */
    public function store(Request $request){
        //Obtenenemos data del request
        $data = $request->json()->all();
        //Creamos el pedido
        $pedido = Pedidos::create([
            'id_usuario' => $data['id_usuario'],
            'id_restaurante' => $data['id_restaurante'],
            'total' => $data['Total'],
            'estado' => $data['Estado']
        ]);
        //Creamos el detalle del pedido
        $detalle = array();
        foreach($data['detalle'] as $detalle){
            $detalle[] = DetallePedidos::create([
                'id_pedido' => $pedido->id,
                'id_plato' => $detalle['id_plato'],
                'cantidad' => $detalle['cantidad'],
                'total' => $detalle['total']
            ]);
        }

        $pedido->detalle = $detalle;

        //$pedido = Pedidos::create($request->all());
        return response()->json($pedido);
    }

    /**
     * @OA\Put(
     * path="/pedidos/{id}",
     * summary="Actualizar un pedido",
     * operationId="updatePedido",
     * tags={"pedidos"},
     * @OA\Parameter(
     *   description="ID del pedido",
     *   in="path",
     *   name="id",
     *   required=true,
     *   @OA\Schema(
     *      type="integer",
     *      format="int64"
     *   )
     * ),
     * @OA\RequestBody(
     *    required=true,
     *    description="Datos del pedido",
     *    @OA\JsonContent(ref="#/components/schemas/PedidosSchema")
     * ),
     * @OA\Response(
     *  response=200,
     *  description="Un pedido",
     *  @OA\JsonContent(ref="#/components/schemas/PedidosSchema")
     * ),
     * @OA\Response(
     *  response="default",
     *  description="unexpected error",
     *  @OA\JsonContent(ref="#/components/schemas/Error")
     * )
     * )
     */
    public function update(Request $request, $id){
        // $pedido = Pedidos::findOrFail($id);
        // $pedido->update($request->all());
        $data = $request->json()->all();

        // Actualizar el pedido
        $pedido = Pedidos::find($id);
        if (!$pedido) {
            return response()->json(['mensaje' => 'Pedido no encontrado'], 404);
        }

        $pedido->id_restaurante = $data['id_restaurante'];
        $pedido->id_usuario = $data['id_usuario'];
        $pedido->total = $data['total'];
        $pedido->estado = $data['estado'];
        $pedido->save();

        $detalles = array();
        // Actualizar los detalles del pedido
        foreach ($data['detalle'] as $detalleActualizado) {
            $detalle = DetallePedidos::find($detalleActualizado['id']);
            if (!$detalle) {
                return response()->json(['mensaje' => 'Detalle del pedido no encontrado'], 404);
            }

            $detalle->id_plato = $detalleActualizado['id_plato'];
            $detalle->cantidad = $detalleActualizado['cantidad'];
            $detalle->total = $detalleActualizado['total'];
            $detalle->save();

            $detalles[] = $detalle;
        }

        $pedido->detalle = $detalles;
        return response()->json($pedido);
    }

    /**
     * @OA\Delete(
     *   path="/pedidos/{id}",
     *   summary="Eliminar un pedido",
     *   operationId="deletePedido",
     *   tags={"pedidos"},
     *   @OA\Parameter(
     *      description="ID del pedido",
     *      in="path",
     *      name="id",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Un pedido",
     *      @OA\JsonContent(ref="#/components/schemas/Pedidos")
     *   ),
     *   @OA\Response(
     *      response="default",
     *      description="unexpected error",
     *      @OA\JsonContent(ref="#/components/schemas/Error")
     *   )
     * )
     */
    public function delete($id){
        $pedido = Pedidos::findOrFail($id);
        $pedido->delete();
        return response()->json($pedido);
    }
}
