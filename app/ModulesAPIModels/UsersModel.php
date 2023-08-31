<?php namespace App\ModulesAP\Models;

use asligresik\easyapi\Models\BaseModel;

class UsersModel extends BaseModel
{
    protected $table = 'users';
    protected $returnType = 'App\ModulesAP\Entities\Users';
    protected $primaryKey = 'id';    
    protected $allowedFields = [
        'name',
		'email',
		'password',
		'created_at',
		'updated_at',
		'deleted_at'
    ];
    protected $validationRules = [
        'id' => 'numeric|required|is_unique[users.id,id,{id}]',
		'name' => 'max_length[255]|required',
		'email' => 'max_length[255]|required',
		'password' => 'max_length[255]|required',
		'created_at' => 'valid_date',
		'updated_at' => 'valid_date',
		'deleted_at' => 'valid_date'
    ];   
}
