<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @OA\Get(
     *     path="/example",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public static function getExample()
    {
        //return "Hello World";
        phpinfo();
    }

    //
}
