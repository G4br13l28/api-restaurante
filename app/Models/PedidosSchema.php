<?php

/**
 * @OA\Schema(
 *  schema="PedidosSchema",
 *  title="Pedidos",
 *  description="Detalle del pedido",
 * )
 */
class PedidoSchema{

    /**
     * @OA\Property(
     *   property="id",
     *   type="integer",
     *   format="int32",
     *   description="ID",
     *   example=1
     * )
     *
     * @var integer
     */
    private $id;
    /**
     * @OA\Property(
     *   property="id_usuario",
     *   type="integer",
     *   format="int32",
     *   description="ID del usuario",
     *   example=1
     * )
     *
     * @var integer
     */
    private $id_usuario;
    /**
     * @OA\Property(
     *   property="id_restaurante",
     *   type="integer",
     *   format="int32",
     *   description="ID del restaurante",
     *  example=1
     * )
     *
     * @var integer
     */
    private $id_restaurante;
    /**
     * @OA\Property(
     *   property="Estado",
     *   type="string",
     *   description="Estado del pedido",
     *   example="Pendiente"
     * )
     *
     * @var integer
     */
    private $estado;
    /**
     * @OA\Property(
     *   property="Fecha",
     *   type="date",
     *   description="Fecha del pedido",
     *   example="2021-01-01"
     * )
     *
     * @var date
     */
    private $fecha;
    /**
     * @OA\Property(
     *   property="Total",
     *   type="decimal",
     *   format="decimal",
     *   description="Total del pedido",
     *   example=10
     * )
     *
     * @var integer
     */
    private $total;

    /**
     * @OA\Property(
     *  property="detalle",
     *  type="array",
     *  description="Detalle del pedido",
     *  @OA\Items(
     *      type="object",
     *      @OA\Property(
     *          property="id_pedido",
     *          type="integer",
     *          format="int32",
     *          description="ID del pedido",
     *          example=1
     *      ),
     *      @OA\Property(
     *          property="id_plato",
     *          type="integer",
     *          format="int32",
     *          description="ID del plato",
     *          example=1
     *      ),
     *      @OA\Property(
     *          property="cantidad",
     *          type="integer",
     *          format="int32",
     *          description="Cantidad",
     *          example=1
     *      ),
     *      @OA\Property(
     *          property="total",
     *          type="decimal",
     *          format="decimal",
     *          description="Total del plato",
     *          example=10
     *      )
     *  )
     * )
     *
     * @var array
     */
    private $detalle;
}
