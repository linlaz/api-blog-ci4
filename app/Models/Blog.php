<?php

namespace App\Models;

use CodeIgniter\Model;

class Blog extends Model
{
    protected $table            = 'blogs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title', 'slug',
        'description', 'thumbnail', 'categories_id', 'author_id', 'status'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['slug'];

    public function slug($data)
    {
        $data['data']['slug'] = str_replace(' ', '-', strtolower($data['data']['title']));
        $check = $this->like('slug', $data['data']['slug'], insensitiveSearch: true)->countAllResults();
        if ($check > 0) {
            $data['data']['slug'] .= '-' . $check + 1;
        }
        return $data;
    }

    public function withCategory($blogs)
    {
        $categoryField = ['id', 'name','slug'];
        foreach ($blogs as &$blog) {
            $category = $this->db->table('categories')->select($categoryField)->getWhere(['id' => $blog['categories_id']])->getRow();
            if ($category !== null) {
                $blog['category'] = $category;
            }
        }
        return $blogs;
    }

    public function withAuthor($blogs)
    {
        $authorField = ['id','name','email'];
        foreach ($blogs as &$blog) {
            $author = $this->db->table('users')->select($authorField)->getWhere(['id' => $blog['author_id']])->getRow();
            if ($author !== null) {
                $blog['author'] = $author;
            }
        }
        return $blogs;
    }
}
