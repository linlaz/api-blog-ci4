<?php

namespace App\ModulesAP\Controllers;

use asligresik\easyapi\Controllers\BaseResourceController;

class Users extends BaseResourceController
{
    protected $modelName = 'App\ModulesAP\Models\UsersModel';

    /**
     * @OA\Get(
     *     path="/users",
     *     tags={"Users"},
     *     summary="Find list Users",
     *     description="Returns list of Users",
     *     operationId="getUsers",  
     * @OA\Response(
     *     response=200,
     *     description="List of Users",
     *     @OA\JsonContent(type="object",
     *         @OA\Property(property="status", type="integer", example=200),
     *         @OA\Property(property="error", type="boolean", example=false),
     *         @OA\Property(property="message", type="string", example="List of Users"),
     *         @OA\Property(property="data", type="array", @OA\Items(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="name", type="string", example="admin"),
     *             @OA\Property(property="email", type="string", example="admin@gmail.com"),
     *             @OA\Property(property="created_at", type="string", example="2023-08-26 14:59:32"),
     *             @OA\Property(property="updated_at", type="string", example="2023-08-26 14:59:32"),
     *             @OA\Property(property="deleted_at", type="string", example=null),
     *         )),
     *     ),
     * ),
     * @OA\Response(
     *     response=401,
     *     description="Unauthorized - Must Login",
     *     @OA\JsonContent(type="object",
     *         @OA\Property(property="success", type="boolean", example=false),
     *         @OA\Property(property="code", type="integer", example=401),
     *         @OA\Property(property="error", type="boolean", example=false),
     *         @OA\Property(property="message", type="string", example="Must Login"),
     *         @OA\Property(property="data", type="object"),
     *     )
     * ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     *     
     */

    /**
     * @OA\Get(
     *     path="/users/{id}",
     *     tags={"Users"},
     *     summary="Find Users by ID",
     *     description="Returns a single Users",
     *     operationId="getUsersById",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Users to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     * @OA\Response(
     *     response=200,
     *     description="Users finded",
     *     @OA\JsonContent(type="object",
     *         @OA\Property(property="status", type="integer", example=200),
     *         @OA\Property(property="error", type="boolean", example=false),
     *         @OA\Property(property="message", type="string", example="Users finded"),
     *         @OA\Property(property="data", type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="name", type="string", example="admin"),
     *             @OA\Property(property="email", type="string", example="admin@gmail.com"),
     *             @OA\Property(property="created_at", type="string", example="2023-08-26 14:59:32"),
     *             @OA\Property(property="updated_at", type="string", example="2023-08-26 14:59:32"),
     *             @OA\Property(property="deleted_at", type="string", example=null),
     *         ),
     *     ),
     * ),
     * @OA\Response(
     *     response=401,
     *     description="Unauthorized - Must Login",
     *     @OA\JsonContent(type="object",
     *         @OA\Property(property="success", type="boolean", example=false),
     *         @OA\Property(property="code", type="integer", example=401),
     *         @OA\Property(property="error", type="boolean", example=false),
     *         @OA\Property(property="message", type="string", example="Must Login"),
     *         @OA\Property(property="data", type="object"),
     *     )
     * ),
     *     security={
     *         {"bearer_auth": {}}
     *     }
     * )
     *     
     */
    /**
     * @OA\Delete(
     *     path="/users/{id}",
     *     tags={"Users"},
     *     summary="Deletes a Users",
     *     operationId="deleteUsers",     
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Users id to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     * @OA\Response(
     *     response=404,
     *     description="No users found",
     *     @OA\JsonContent(type="object",
     *         @OA\Property(property="status", type="integer", example=404),
     *         @OA\Property(property="error", type="boolean", example=true),
     *         @OA\Property(property="messages", type="string", example="No users found"),
     *         @OA\Property(property="data", type="array", @OA\Items()),
     *     ),
     * ),
     *     @OA\Response(
     *         response=200,
     *         description="Success: users successfully deleted",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="messages", type="string", example="users successfully deleted"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),

     *     security={
     *         {"bearer_auth": {}}
     *     },
     * )
     */
}
