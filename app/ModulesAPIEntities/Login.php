<?php

namespace App\ModulesAP\Entities;

use asligresik\easyapi\Entities\BaseEntity;

/**    
 * Class Login
 * @OA\Schema(
 *     title="Login",
 *     description="Login"
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="Everything about your Auth" 
 * )
 */
class Login extends BaseEntity
{
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

}

/**
 *
 * @OA\RequestBody(
 *     request="Login",
 *     description="Login", 
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(ref="#/components/schemas/Login")
 *     ),
 * )
 */
