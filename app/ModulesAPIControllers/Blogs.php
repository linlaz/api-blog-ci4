<?php

namespace App\ModulesAP\Controllers;

use asligresik\easyapi\Controllers\BaseResourceController;

class Blogs extends BaseResourceController
{
    protected $modelName = 'App\ModulesAP\Models\BlogsModel';

    /**
     * @OA\Get(
     *     path="/blogs",
     *     tags={"Blogs"},
     *     summary="Find list Blogs",
     *     description="Returns list of Blogs",
     *     operationId="getBlogs",  
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="status by column defined",     
     *         @OA\Schema(
     *             type="string",
     *             enum={"published", "draft"} 
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="orderBy",
     *         in="query",
     *         description="orderBy by column defined",     
     *         @OA\Schema(
     *             type="string",
     *             default="id",          
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="direction",
     *         in="query",
     *         description="direction for order",   
     *         @OA\Schema(
     *             type="string",
     *             default="DESC",
     *             enum={"DESC", "ASC"},
     *         )
     *     ),   
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         description="limit data display per page",     
     *         @OA\Schema(
     *             type="int32"     
     *         )
     *     ),   
     * @OA\Response(
     *     response=200,
     *     description="List of blogs",
     *     @OA\JsonContent(type="object",
     *         @OA\Property(property="status", type="integer", example=200),
     *         @OA\Property(property="error", type="boolean", example=false),
     *         @OA\Property(property="message", type="string", example="List of blogs"),
     *         @OA\Property(property="data", type="array", @OA\Items(
     *             @OA\Property(property="id", type="integer", example=9),
     *             @OA\Property(property="title", type="string", example="try title12123123"),
     *             @OA\Property(property="slug", type="string", example="try-title12123123"),
     *             @OA\Property(property="description", type="string", example="try description"),
     *             @OA\Property(property="thumbnail", type="string", example="https://santrikoding.com/storage/posts/pfpmpIQr9ObGjLm8EgSiecTOHU1csTVrwkMaR9DL.png"),
     *             @OA\Property(property="categories_id", type="integer", example=1),
     *             @OA\Property(property="author_id", type="integer", example=1),
     *             @OA\Property(property="status", type="string", example="published"),
     *             @OA\Property(property="created_at", type="string", example="2023-08-26 14:59:32"),
     *             @OA\Property(property="updated_at", type="string", example="2023-08-26 14:59:32"),
     *             @OA\Property(property="deleted_at", type="string", example=null),
     *             @OA\Property(property="category", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Teknologi"),
     *                 @OA\Property(property="slug", type="string", example="teknologi"),
     *             ),
     *             @OA\Property(property="author", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="admin"),
     *                 @OA\Property(property="email", type="string", example="admin@gmail.com"),
     *             ),
     *         )),
     *     ),
     * )
     * )
     *     
     */

    /**
     * @OA\Get(
     *     path="/blogs/{id}",
     *     tags={"Blogs"},
     *     summary="Find Blogs by ID",
     *     description="Returns a single Blogs",
     *     operationId="getBlogsById",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of Blogs to return",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     * @OA\Response(
     *     response=200,
     *     description="List of blogs",
     *     @OA\JsonContent(type="object",
     *         @OA\Property(property="status", type="integer", example=200),
     *         @OA\Property(property="error", type="boolean", example=false),
     *         @OA\Property(property="message", type="string", example="List of blogs"),
     *         @OA\Property(property="data", type="array", @OA\Items(
     *             @OA\Property(property="id", type="integer", example=9),
     *             @OA\Property(property="title", type="string", example="try title12123123"),
     *             @OA\Property(property="slug", type="string", example="try-title12123123"),
     *             @OA\Property(property="description", type="string", example="try description"),
     *             @OA\Property(property="thumbnail", type="string", example="https://santrikoding.com/storage/posts/pfpmpIQr9ObGjLm8EgSiecTOHU1csTVrwkMaR9DL.png"),
     *             @OA\Property(property="categories_id", type="integer", example=1),
     *             @OA\Property(property="author_id", type="integer", example=1),
     *             @OA\Property(property="status", type="string", example="published"),
     *             @OA\Property(property="created_at", type="string", example="2023-08-26 14:59:32"),
     *             @OA\Property(property="updated_at", type="string", example="2023-08-26 14:59:32"),
     *             @OA\Property(property="deleted_at", type="string", example=null),
     *             @OA\Property(property="category", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Teknologi"),
     *                 @OA\Property(property="slug", type="string", example="teknologi"),
     *             ),
     *             @OA\Property(property="author", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="admin"),
     *                 @OA\Property(property="email", type="string", example="admin@gmail.com"),
     *             ),
     *         )),
     *     ),
     * ),
     * @OA\Response(
     *     response=404,
     *     description="No blog found",
     *     @OA\JsonContent(type="object",
     *         @OA\Property(property="status", type="integer", example=404),
     *         @OA\Property(property="error", type="boolean", example=true),
     *         @OA\Property(property="messages", type="string", example="No blog found"),
     *         @OA\Property(property="data", type="array", @OA\Items()),
     *     ),
     * ),
     * )
     *     
     */

    /**
     * @OA\Post(
     *     path="/blogs",
     *     tags={"Blogs"},
     *     summary="Add a new Blogs to the store",
     *     operationId="addBlogs",
     *     @OA\Response(
     *         response=200,
     *         description="List of blogs",
     *         @OA\JsonContent(type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="error", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="List of blogs"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=9),
     *                 @OA\Property(property="title", type="string", example="try title12123123"),
     *                 @OA\Property(property="slug", type="string", example="try-title12123123"),
     *                 @OA\Property(property="description", type="string", example="try description"),
     *                 @OA\Property(property="thumbnail", type="string", example="https://santrikoding.com/storage/posts/pfpmpIQr9ObGjLm8EgSiecTOHU1csTVrwkMaR9DL.png"),
     *                 @OA\Property(property="categories_id", type="integer", example=1),
     *                 @OA\Property(property="author_id", type="integer", example=1),
     *                 @OA\Property(property="status", type="string", example="published"),
     *                 @OA\Property(property="created_at", type="string", example="2023-08-26 14:59:32"),
     *                 @OA\Property(property="updated_at", type="string", example="2023-08-26 14:59:32"),
     *                 @OA\Property(property="deleted_at", type="string", example=null),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input",
     *         @OA\JsonContent(type="object",
     *             @OA\Property(property="status", type="integer", example=400),
     *             @OA\Property(property="error", type="boolean", example=true),
     *             @OA\Property(property="message", type="object",
     *              @OA\Property(property="thumbnail", type="string", example="thumbnail is not a valid uploaded file"),
     *             ),
     *             @OA\Property(property="data", type="object"),
     *      ),
     *     ),
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
     *     },
     *      requestBody={"$ref": "#/components/requestBodies/Blogs"}
     * 
     * )
     */


    /**
     * @OA\Post(
     *     path="/blogs/{id}",
     *     tags={"Blogs"},
     *     summary="Update an existing Blogs",
     *     operationId="updateBlogs",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Blogs id to update",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of blogs",
     *         @OA\JsonContent(type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="error", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="List of blogs"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=9),
     *                 @OA\Property(property="title", type="string", example="try title12123123"),
     *                 @OA\Property(property="slug", type="string", example="try-title12123123"),
     *                 @OA\Property(property="description", type="string", example="try description"),
     *                 @OA\Property(property="thumbnail", type="string", example="https://santrikoding.com/storage/posts/pfpmpIQr9ObGjLm8EgSiecTOHU1csTVrwkMaR9DL.png"),
     *                 @OA\Property(property="categories_id", type="integer", example=1),
     *                 @OA\Property(property="author_id", type="integer", example=1),
     *                 @OA\Property(property="status", type="string", example="published"),
     *                 @OA\Property(property="created_at", type="string", example="2023-08-26 14:59:32"),
     *                 @OA\Property(property="updated_at", type="string", example="2023-08-26 14:59:32"),
     *                 @OA\Property(property="deleted_at", type="string", example=null),
     *             ),
     *         ),
     *     ),

     * @OA\Response(
     *     response=404,
     *     description="No blog found",
     *     @OA\JsonContent(type="object",
     *         @OA\Property(property="status", type="integer", example=404),
     *         @OA\Property(property="error", type="boolean", example=true),
     *         @OA\Property(property="messages", type="string", example="No blog found"),
     *         @OA\Property(property="data", type="array", @OA\Items()),
     *     ),
     * ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input",
     *         @OA\JsonContent(type="object",
     *             @OA\Property(property="status", type="integer", example=400),
     *             @OA\Property(property="error", type="boolean", example=true),
     *             @OA\Property(property="message", type="object",
     *              @OA\Property(property="thumbnail", type="string", example="thumbnail is not a valid uploaded file"),
     *             ),
     *             @OA\Property(property="data", type="object"),
     *      ),
     *     ),

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
     *     },     
     *     requestBody={"$ref": "#/components/requestBodies/Blogs"}
     * )
     */

    /**
     * @OA\Delete(
     *     path="/blogs/{id}",
     *     tags={"Blogs"},
     *     summary="Deletes a Blog",
     *     operationId="deleteBlog",
     *     security={
     *         {"bearer_auth": {}}
     *     },
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Blog ID to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success: Blog successfully deleted",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="messages", type="string", example="Blog successfully deleted"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Blog Not Found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="messages", type="string", example="Blog not found"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     )
     * )
     */
}
