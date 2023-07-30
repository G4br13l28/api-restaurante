<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * schema="Platos",
 * title="Platos",
 * description="Platos",
 * @OA\Property(
 *  property="nombre",
 * type="string",
 * description="Nombre",
 * example="Plato 1"
 * ),
 * @OA\Property(
 * property="precio",
 * type="string",
 * description="Precio",
 * example="10.00"
 * ),
 * @OA\Property(
 * property="descripcion",
 * type="string",
 * description="Descripcion",
 * example="Descripcion del plato 1"
 * ),
 * @OA\Property(
 * property="id_restaurante",
 * type="integer",
 * description="ID del restaurante",
 * example="1"
 * )
 * )
 */
class Platos extends Model
{

    const CREATED_AT = 'creado';
    const UPDATED_AT = 'actualizado';

    use HasFactory;
    protected $table = 'platos';
    protected $fillable = ['nombre', 'precio', 'descripcion', 'id_restaurante'];
}
