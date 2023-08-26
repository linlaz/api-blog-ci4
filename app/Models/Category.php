<?php

namespace App\Models;

use App\Models\Blog;
use CodeIgniter\Model;

class Category extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['name', 'slug', 'status'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowCallbacks = true;
    protected $beforeInsert   = ['slug'];

    public function slug($data){
        $data['data']['slug'] = str_replace(' ','-', strtolower($data['data']['name']));
        $check = $this->like('slug', $data['data']['slug'],insensitiveSearch:true)->countAllResults();
        if ($check > 0) {
            $data['data']['slug'] .= '-'.$check+1;
        }
        return $data;
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'categories_id');
    }
}
