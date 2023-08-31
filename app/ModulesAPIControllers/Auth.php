<?php

namespace App\ModulesAP\Controllers;

use asligresik\easyapi\Controllers\BaseResourceController;

class Auth extends BaseResourceController
{
     /**
      * @OA\Info(
      *     description="This is a sample Opensid server.  You can find
out more about Swagger at
[http://swagger.io](http://swagger.io) or on
[irc.freenode.net, #swagger](http://swagger.io/irc/).",
      *     version="1.0.0",
      *     title="Swagger Opensid",
      *     termsOfService="http://swagger.io/terms/",
      *     @OA\Contact(
      *         email="apiteam@swagger.io"
      *     ),
      *     @OA\License(
      *         name="Apache 2.0",
      *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
      *     )
      * )
      */
     /**	 
      * @OA\Server(
      *     description="SwaggerHUB API Mocking",
      *     url="http://localhost:8080/api"
      * )
      */
     /**
      * @OA\SecurityScheme(
      *     type="http",
      *     securityScheme="bearer_auth",
      *     name="bearer_auth",
      *     scheme="bearer",
      *     bearerFormat="JWT"
      * )
      */

     /**
      * @OA\Post(
      *     path="/login",
      *     tags={"Auth"},
      *     summary="User login",
      *     description="Logs in a user using email and password",
      *     operationId="userLogin",
      *     @OA\RequestBody(
      *         required=true,
      *         description="User credentials",
      *         @OA\JsonContent(
      *             @OA\Property(property="email", type="string", example="admin@gmail.com"),
      *             @OA\Property(property="password", type="string", example="admin")
      *         )
      *     ),
      *     @OA\Response(
      *         response=200,
      *         description="Successful login",
      *         @OA\JsonContent(type="object",
      *             @OA\Property(property="status", type="integer", example=200),
      *             @OA\Property(property="error", type="bool", example=false),
      *             @OA\Property(property="message", type="string", example="Login successful"),
      *             @OA\Property(property="data", type="object",
      *                 @OA\Property(property="token", type="string", example="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."),
      *             )
      *         )
      *     ),
      *     @OA\Response(
      *         response=404,
      *         description="Invalid username or password",
      *         @OA\JsonContent(type="object",
      *             @OA\Property(property="status", type="integer", example=401),
      *             @OA\Property(property="error", type="bool", example=true),
      *             @OA\Property(property="message", type="string", example="Invalid username or password"),
      *             @OA\Property(property="data", type="array", @OA\Items()),
      *         )
      *     )
      * )
      */

      /**
      * @OA\Post(
      *     path="/register",
      *     tags={"Auth"},
      *     summary="User Registrasi",
      *     description="Registrasi in a user",
      *     operationId="userRegistrasi",
      *     @OA\RequestBody(
      *         required=true,
      *         description="User credentials",
      *         @OA\JsonContent(
      *             @OA\Property(property="name", type="string", example="admin"),
      *             @OA\Property(property="email", type="string", example="admin@gmail.com"),
      *             @OA\Property(property="password", type="string", example="admin"),
      *         )
      *     ),
      *     @OA\Response(
      *         response=200,
      *         description="User added successfully",
      *         @OA\JsonContent(type="object",
      *             @OA\Property(property="status", type="integer", example=200),
      *             @OA\Property(property="error", type="bool", example=false),
      *             @OA\Property(property="message", type="string", example="User added successfully"),
      *             @OA\Property(property="data", type="object",
      *                 @OA\Property(property="token", type="string", example="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."),
      *             )
      *         )
      *     ),
      *     @OA\Response(
      *         response=404,
      *         description="Invalid username or password",
      *         @OA\JsonContent(type="object",
      *             @OA\Property(property="status", type="integer", example=401),
      *             @OA\Property(property="error", type="bool", example=true),
      *             @OA\Property(property="message", type="string", example="Invalid username or password"),
      *             @OA\Property(property="data", type="array", @OA\Items()),
      *         )
      *     )
      * )
      */
}
