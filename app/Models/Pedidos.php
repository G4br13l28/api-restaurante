<?php

// Modelo para pedidos
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *  @OA\Schema(
 *  schema="Pedidos",
 * title="Pedidos",
 * description="Pedidos",
 * @OA\Property(
 *    property="id",
 *   type="integer",
 *  description="ID",
 * example="1"
 * ),
 * @OA\Property(
 *   property="id_usuario",
 *  type="integer",
 * description="ID del usuario",
 * example="1"
 * ),
 * @OA\Property(
 *  property="id_restaurante",
 * type="integer",
 * description="ID del restaurante",
 * example="1"
 * ),
 * @OA\Property(
 * property="cantidad",
 * type="integer",
 * description="Cantidad",
 * example="1"
 * ),
 * @OA\Property(
 * property="precio",
 * type="integer",
 * description="Precio",
 * example="10"
 * ),
 * @OA\Property(
 * property="fecha",
 * type="string",
 * description="Fecha",
 * example="2021-01-01"
 * ),
 * @OA\Property(
 * property="estado",
 * type="string",
 * description="Estado",
 * example="Pendiente"
 * )
 * )
 *
 */
class Pedidos extends Model{

    const CREATED_AT = 'creado';
    const UPDATED_AT = 'actualizado';
    use HasFactory;
    protected $table = 'pedidos';
    protected $fillable = ['id_usuario', 'id_restaurante', 'total', 'estado'];
}
