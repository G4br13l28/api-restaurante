<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *  @OA\Schema(
 *  schema="Usuarios",
 * title="Usuarios",
 * description="Usuarios",
 * @OA\Property(
 *    property="dni",
 *   type="string",
 *  description="DNI",
 * example="12345678"
 * ),
 * @OA\Property(
 *   property="nombres",
 *  type="string",
 * description="Nombres",
 * example="Juan"
 * ),
 * @OA\Property(
 *  property="apellidos",
 * type="string",
 * description="Apellidos",
 * example="Perez"
 * ),
 * @OA\Property(
 * property="email",
 * type="string",
 * description="Email",
 * example="juanp.2@mail.com"
 * ),
 * @OA\Property(
 * property="telefono",
 * type="string",
 * description="Telefono",
 * example="987654321"
 * ),
 * @OA\Property(
 * property="direccion",
 * type="string",
 * description="Direccion",
 * example="Av. Los Olivos 123"
 * )
 * )
 *
 */
class Usuarios extends Model{
    use HasFactory;

    const CREATED_AT = 'creado';
    const UPDATED_AT = 'actualizado';

    protected $table = 'usuarios';
    protected $fillable = ['dni', 'nombres', 'apellidos', 'email', 'telefono', 'direccion'];
    //public $timestamps = false;
}
