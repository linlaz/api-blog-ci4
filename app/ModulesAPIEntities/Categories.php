<?php namespace App\ModulesAP\Entities;
use asligresik\easyapi\Entities\BaseEntity;
/**    
* Class Categories
* @OA\Schema(
*     title="Categories",
*     description="Categories"
* )
*
* @OA\Tag(
*     name="Categories",
*     description="Everything about your Categories" 
* )
*/ 
class Categories extends BaseEntity
{
	/**
	 * @OA\Property(		 		 		 
	 *     description="name",
	 *     title="name",
	 *     type="string",
	 * example="category",
	 * 	   nullable=false,
	 * 	   maxLength=255,
	 * )
	 *		 
	 */
	private $name;
	/**
	 * @OA\Property(		 		 		 
	 *     description="status",
	 *     title="status",
	 *     type="string", 
	 * example="draft",
	 * 	   nullable=false,
	 * )
	 *		 
	 */
	private $status;
}
/**
 *
 * @OA\RequestBody(
 *     request="Categories",
 *     description="Categories object that needs to be added", 
 *     @OA\JsonContent(ref="#/components/schemas/Categories"),
 * )
 */