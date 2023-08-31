<?php

namespace App\ModulesAP\Entities;

use asligresik\easyapi\Entities\BaseEntity;

/**    
 * Class Registrasi
 * @OA\Schema(
 *     title="Registrasi",
 *     description="Registrasi"
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="Everything about your Auth" 
 * )
 */
class Registrasi extends BaseEntity
{
    	/**
	 * @OA\Property(		 		 		 
	 *     description="name",
	 *     title="name",
	 *     type="string",
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
 *     request="registrasi",
 *     description="registrasi", 
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(ref="#/components/schemas/Registrasi")
 *     ),
 * )
 */
