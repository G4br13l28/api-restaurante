<?php

/**
 * @OA\Schema(
 * schema="Error",
 * title="Error",
 * description="Error",
 * )
 */
class Error{
    /**
     * @OA\Property(
     * property="code",
     * type="integer",
     * format="int32",
     * description="Codigo de error",
     * example=400
     * )
     *
     * @var integer
     */
    private $code;
    /**
     * @OA\Property(
     * property="message",
     * type="string",
     * description="Mensaje de error",
     * example="Error de validacion"
     * )
     *
     * @var string
     */
    private $message;
    /**
     * @OA\Property(
     * property="errors",
     * type="array",
     * description="Errores",
     * @OA\Items(
     * type="string",
     * description="Error",
     * example="El campo nombre es requerido"
     * )
     * )
     *
     * @var array
     */
    private $errors;
}
