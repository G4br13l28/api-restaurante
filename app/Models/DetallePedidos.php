<?php

// Path: app\Models\DetallePedido.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * schema="DetallePedidosSchema",
 * title="DetallePedidos",
 * description="Detalle del pedido",
 * @OA\Property(
 *  property="id_pedido",
 * type="integer",
 * description="ID del pedido",
 * example="1"
 * ),
 * @OA\Property(
 * property="id_plato",
 * type="integer",
 * description="ID del plato",
 * example="1"
 * ),
 * @OA\Property(
 * property="cantidad",
 * type="integer",
 * description="Cantidad",
 * example="1"
 * ),
 * @OA\Property(
 * property="total",
 * type="integer",
 * description="Total",
 * example="10"
 * )
 * )
 */
class DetallePedidos extends Model{


    const CREATED_AT = 'creado';
    const UPDATED_AT = 'actualizado';

    use HasFactory;
    protected $table = 'detalle_pedidos';
    protected $fillable = ['id_pedido', 'id_plato', 'cantidad', 'total'];
}
