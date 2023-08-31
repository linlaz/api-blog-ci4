<?php namespace App\ModulesAP\Entities;
use asligresik\easyapi\Entities\BaseEntity;
/**    
* Class Users
* @OA\Schema(
*     title="Users",
*     description="Users"
* )
*
* @OA\Tag(
*     name="Users",
*     description="Everything about your Users" 
* )
*/ 
class Users extends BaseEntity
{
    	/**
	 * @OA\Property(		 		 		 
	 *     description="id",
	 *     title="id",
	 *     type="integer",
	 * 	   format="-",	 
	 * 	   nullable=false,
	 * )
	 *		 
	 */
	private $id;
	/**
	 * @OA\Property(		 		 		 
	 *     description="name",
	 *     title="name",
	 *     type="string",
	 * 	   format="-",	 
	 * 	   nullable=false,
	 * 	   maxLength=255,
	 * )
	 *		 
	 */
	private $name;
	/**
	 * @OA\Property(		 		 		 
	 *     description="email",
	 *     title="email",
	 *     type="string",
	 * 	   format="-",	 
	 * 	   nullable=false,
	 * 	   maxLength=255,
	 * )
	 *		 
	 */
	private $email;
	/**
	 * @OA\Property(		 		 		 
	 *     description="password",
	 *     title="password",
	 *     type="string",
	 * 	   format="-",	 
	 * 	   nullable=false,
	 * 	   maxLength=255,
	 * )
	 *		 
	 */
	private $password;
	/**
	 * @OA\Property(		 		 		 
	 *     description="created_at",
	 *     title="created_at",
	 *     type="string",
	 * 	   format="date",	 
	 * 	   nullable=true,
	 * )
	 *		 
	 */
	private $created_at;
	/**
	 * @OA\Property(		 		 		 
	 *     description="updated_at",
	 *     title="updated_at",
	 *     type="string",
	 * 	   format="date",	 
	 * 	   nullable=true,
	 * )
	 *		 
	 */
	private $updated_at;
	/**
	 * @OA\Property(		 		 		 
	 *     description="deleted_at",
	 *     title="deleted_at",
	 *     type="string",
	 * 	   format="date",	 
	 * 	   nullable=true,
	 * )
	 *		 
	 */
	private $deleted_at; 
}
/**
 *
 * @OA\RequestBody(
 *     request="Users",
 *     description="Users object that needs to be added", 
 *     @OA\JsonContent(ref="#/components/schemas/Users"),
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(ref="#/components/schemas/Users")
 *     ),
 *     @OA\MediaType(
 *         mediaType="application/xml",
 *         @OA\Schema(ref="#/components/schemas/Users")
 *     )
 * )
 */