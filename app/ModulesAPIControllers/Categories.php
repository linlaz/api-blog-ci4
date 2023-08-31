<?php

namespace App\ModulesAP\Controllers;

use asligresik\easyapi\Controllers\BaseResourceController;

class Categories extends BaseResourceController
{
    protected $modelName = 'App\ModulesAP\Models\CategoriesModel';

    /**
     * @OA\Get(
     *     path="/categories",
     *     tags={"Categories"},
     *     summary="Find list of Categories",
     *     description="Returns a list of Categories",
     *     operationId="getCategories",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Filter by category status",
     *         @OA\Schema(
     *             type="string",
     *             enum={"published", "draft"}
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of categories",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="error", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Categories list"),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="id", type="string", example="1"),
     *                     @OA\Property(property="name", type="string", example="Teknologi"),
     *                     @OA\Property(property="slug", type="string", example="teknologi"),
     *                     @OA\Property(property="status", type="string", example="published"),
     *                     @OA\Property(property="created_at", type="string", example="2023-08-26 11:37:31"),
     *                     @OA\Property(property="updated_at", type="string", example="2023-08-26 11:37:31"),
     *                     @OA\Property(property="deleted_at", type="string", example=null)
     *                 )
     *             )
     *         )
     *     )
     * )
     */

    /**
     * @OA\Get(
     *     path="/categories/{id}",
     *     tags={"Categories"},
     *     summary="Find Categories by ID",
     *     description="Returns a single Categories",
     *     operationId="getCategoriesById",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Categories to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     * @OA\Response(
     *     response=200,
     *     description="List of categorys",
     *     @OA\JsonContent(type="object",
     *         @OA\Property(property="status", type="integer", example=200),
     *         @OA\Property(property="error", type="boolean", example=false),
     *         @OA\Property(property="message", type="string", example="List of categorys"),
     *         @OA\Property(property="data", type="object", 
     *                     @OA\Property(property="id", type="string", example="1"),
     *                     @OA\Property(property="name", type="string", example="Teknologi"),
     *                     @OA\Property(property="slug", type="string", example="teknologi"),
     *                     @OA\Property(property="status", type="string", example="published"),
     *                     @OA\Property(property="created_at", type="string", example="2023-08-26 11:37:31"),
     *                     @OA\Property(property="updated_at", type="string", example="2023-08-26 11:37:31"),
     *                     @OA\Property(property="deleted_at", type="string", example=null)
     *         ),
     *     ),
     * ),
     * @OA\Response(
     *     response=404,
     *     description="No category found",
     *     @OA\JsonContent(type="object",
     *         @OA\Property(property="status", type="integer", example=404),
     *         @OA\Property(property="error", type="boolean", example=true),
     *         @OA\Property(property="messages", type="string", example="No category found"),
     *         @OA\Property(property="data", type="array", @OA\Items()),
     *     ),
     * ),
     * )
     *     
     */

    /**
     * @OA\Post(
     *     path="/categories",
     *     tags={"Categories"},
     *     summary="Add a new Categories to the store",
     *     operationId="addCategories",
     *     @OA\Response(
     *         response=200,
     *         description="categories created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="error", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Categories Created"),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                     @OA\Property(property="id", type="string", example="1"),
     *                     @OA\Property(property="name", type="string", example="Teknologi"),
     *                     @OA\Property(property="slug", type="string", example="teknologi"),
     *                     @OA\Property(property="status", type="string", example="published"),
     *                     @OA\Property(property="created_at", type="string", example="2023-08-26 11:37:31"),
     *                     @OA\Property(property="updated_at", type="string", example="2023-08-26 11:37:31"),
     *                     @OA\Property(property="deleted_at", type="string", example=null)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input",
     *         @OA\JsonContent(type="object",
     *             @OA\Property(property="status", type="integer", example=400),
     *             @OA\Property(property="error", type="boolean", example=true),
     *             @OA\Property(property="message", type="object",
     *              @OA\Property(property="status", type="string", example="status wrong format"),
     *             ),
     *             @OA\Property(property="data", type="object"),
     *      ),
     *     ),
     * @OA\Response(
     *     response=401,
     *     description="Unauthorized: User must login",
     *     @OA\JsonContent(
     *         type="object",
     *         @OA\Property(property="success", type="boolean", example=false),
     *         @OA\Property(property="code", type="integer", example=401),
     *         @OA\Property(property="error", type="boolean", example=false),
     *         @OA\Property(property="message", type="string", example="Must Login"),
     *         @OA\Property(property="data", type="object")
     *     )
     * ),
     *     security={
     *         {"bearer_auth": {}}
     *     },     
     *     requestBody={"$ref": "#/components/requestBodies/Categories"}
     * )
     */

    /**
     * @OA\Post(
     *     path="/categories/{id}",
     *     tags={"Categories"},
     *     summary="Update an existing Categories",
     *     operationId="updateCategories",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Categories id to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of categories",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="error", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Categories updated"),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                     @OA\Property(property="id", type="string", example="1"),
     *                     @OA\Property(property="name", type="string", example="Teknologi"),
     *                     @OA\Property(property="slug", type="string", example="teknologi"),
     *                     @OA\Property(property="status", type="string", example="published"),
     *                     @OA\Property(property="created_at", type="string", example="2023-08-26 11:37:31"),
     *                     @OA\Property(property="updated_at", type="string", example="2023-08-26 11:37:31"),
     *                     @OA\Property(property="deleted_at", type="string", example=null)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input",
     *         @OA\JsonContent(type="object",
     *             @OA\Property(property="status", type="integer", example=400),
     *             @OA\Property(property="error", type="boolean", example=true),
     *             @OA\Property(property="message", type="object",
     *              @OA\Property(property="status", type="string", example="status wrong format"),
     *             ),
     *             @OA\Property(property="data", type="object"),
     *      ),
     *     ),
     * @OA\Response(
     *     response=404,
     *     description="No category found",
     *     @OA\JsonContent(type="object",
     *         @OA\Property(property="status", type="integer", example=404),
     *         @OA\Property(property="error", type="boolean", example=true),
     *         @OA\Property(property="messages", type="string", example="No category found"),
     *         @OA\Property(property="data", type="array", @OA\Items()),
     *     ),
     * ),
     *     security={
     *         {"bearer_auth": {}}
     *     },     
     *     requestBody={"$ref": "#/components/requestBodies/Categories"}
     * )
     */

    /**
     * @OA\Delete(
     *     path="/categories/{id}",
     *     tags={"Categories"},
     *     summary="Deletes a Category",
     *     operationId="deleteCategory",
     *     security={
     *         {"bearer_auth": {}}
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Category ID to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success: Category successfully deleted",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="messages", type="string", example="Category successfully deleted"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category Not Found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="messages", type="string", example="Category not found"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     )
     * )
     */
}
