<?php namespace App\ModulesAP\Models;

use asligresik\easyapi\Models\BaseModel;

class BlogsModel extends BaseModel
{
    protected $table = 'blogs';
    protected $returnType = 'App\ModulesAP\Entities\Blogs';
    protected $primaryKey = 'id';    
    protected $allowedFields = [
        'title',
		'description',
		'thumbnail',
		'categories_id',
		'author_id',
		'status'
    ];
    protected $validationRules = [
        'id' => 'numeric|required|is_unique[blogs.id,id,{id}]',
		'title' => 'max_length[255]|required',
		'description' => 'required',
		'thumbnail' => 'max_length[255]|required',
		'categories_id' => 'numeric|required',
		'author_id' => 'numeric|required',
		'status' => 'required',
    ];   
}
