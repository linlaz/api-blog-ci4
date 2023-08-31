<?php namespace App\ModulesAP\Models;

use asligresik\easyapi\Models\BaseModel;

class CategoriesModel extends BaseModel
{
    protected $table = 'categories';
    protected $returnType = 'App\ModulesAP\Entities\Categories';
    protected $primaryKey = 'id';    
    protected $allowedFields = [
        'name',
		'status'
    ];
    protected $validationRules = [
        'id' => 'numeric|required|is_unique[categories.id,id,{id}]',
		'name' => 'max_length[255]|required',
		'status' => 'required',    ];   
}
