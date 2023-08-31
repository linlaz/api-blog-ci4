<?php namespace App\ModulesAP\Entities;
use asligresik\easyapi\Entities\BaseEntity;
/**    
* Class Blogs
* @OA\Schema(
*     title="Blogs",
*     description="Blogs"
* )
*
* @OA\Tag(
*     name="Blogs",
*     description="Everything about your Blogs" 
* )
*/ 
class Blogs extends BaseEntity
{
	/**
	 * @OA\Property(		 		 		 
	 *     description="title",
	 *     title="title",
	 *     type="string", 
	 * 	   nullable=false,
	 * 	   maxLength=255,
	 * )
	 *		 
	 */
	private $title;
	/**
	 * @OA\Property(		 		 		 
	 *     description="description",
	 *     title="description",
	 *     type="text", 
	 * 	   nullable=false,
	 * 	   maxLength=255,
	 * )
	 *		 
	 */

	private $description;
	/**
	 * @OA\Property(		 		 		 
	 *     description="thumbnail",
	 *     title="thumbnail",
	 *     type="string",
	 * 	   format="binary"
	 * )
	 *		 
	 */
	private $thumbnail;
	/**
	 * @OA\Property(		 		 		 
	 *     description="categories_id",
	 *     title="categories_id",
	 *     type="integer", 
	 * 	   nullable=false,
	 * )
	 *		 
	 */
	private $categories_id;
	/**
	 * @OA\Property(		 		 		 
	 *     description="author_id",
	 *     title="author_id",
	 *     type="integer", 
	 * 	   nullable=false,
	 * )
	 *		 
	 */
	private $author_id;
	/**
	 * @OA\Property(		 		 		 
	 *     description="status",
	 *     title="status",
	 *     type="string", 
	 * 	   nullable=false,
	 * 	   enum={"published", "draft"},
	 * 	   default="published"
	 * )
	 *		 
	 */
	private $status;
}
/**
 *
 * @OA\RequestBody(
 *     request="Blogs",
 *     description="Blogs object that needs to be added", 
 *     @OA\MediaType(
 *         mediaType="multipart/form-data",
 *         @OA\Schema(ref="#/components/schemas/Blogs")
 *     ),
 * )
 */