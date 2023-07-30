<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * schema="Restaurantes",
 * title="Restaurantes",
 * description="Restaurantes",
 * @OA\Property(
 *   property="ruc",
 * type="string",
 * description="RUC",
 * example="12345678901"
 * ),
 * @OA\Property(
 * property="nombre",
 * type="string",
 * description="Nombre",
 * example="Restaurante 1"
 * ),
 * @OA\Property(
 * property="direccion",
 * type="string",
 * description="Direccion",
 * example="Av. Los Olivos 123"
 * ),
 * @OA\Property(
 * property="telefono",
 * type="string",
 * description="Telefono",
 * example="987654321"
 * ),
 * @OA\Property(
 * property="email",
 * type="string",
 * description="Email",
 * example="restaurante@email.com"
 * ),
 * @OA\Property(
 * property="categoria",
 * type="string",
 * description="Categoria",
 * example="Comida rapida"
 * )
 * )
 */
class Restaurantes extends Model
{

    const CREATED_AT = 'creado';
    const UPDATED_AT = 'actualizado';

    use HasFactory;
    protected $table = 'restaurantes';
    protected $fillable = ['ruc', 'nombre', 'direccion', 'telefono', 'email', 'categoria'];
}
