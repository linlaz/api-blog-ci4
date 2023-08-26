<?php

namespace App\Controllers;

use App\Models\Blog;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class BlogController extends ResourceController
{
    use ResponseTrait;

    public $blog;
    public function __construct() {
        $this->blog = new Blog();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $status =$this->request->getVar('status');
        if ($status !== null && $status !== '') {
            $data = $this->blog->where('status',$status)->findAll();
        }else{
            $data = $this->blog->findAll();
        }
        $response = [
			'status' => 200,
			"error" => false,
			'messages' => 'blog list',
			'data' => $data
		];
        return $this->respond($response);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->blog->find($id);
        if (!empty($data)) {

			$response = [
				'status' => 200,
				"error" => false,
				'messages' => 'blog finded successfully',
				'data' => $data
			];

		}else{
            $response = [
				'status' => 404,
				"error" => true,
				'messages' => 'No blog found',
				'data' => []
			];
        }
        return $this->respond($response);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'uploaded[thumbnail]|max_size[thumbnail,1024]|is_image[thumbnail]',
            'categories_id' => 'required',
            'author_id' => 'required',
            'status' => 'required'
        ];
    
        if (!$this->validate($rules)) {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
        } else {
            $file = $this->request->getFile('thumbnail');
            $fileName = $file->getRandomName();
            $data = [
                'title' => $this->request->getVar('title'),
                'description' => $this->request->getVar('description'),
                'thumbnail' => 'uploads/thumbnail/'.$fileName,
                'categories_id' => $this->request->getVar('categories_id'),
                'author_id' => $this->request->getVar('author_id'),
                'status' => $this->request->getVar('status')
            ];
            $this->blog->insert($data);
    
            if ($file->isValid() && ! $file->hasMoved()) {
                $file->move('uploads/thumbnail/', $fileName);
            } else {
                $response = [
                    'status' => 500,
                    'error' => true,
                    'message' => 'Thumbnail upload failed',
                    'data' => []
                ];
                return $this->respond($response);
            }
    
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Blog added successfully',
                'data' => $data
            ];
        }
    
        return $this->respond($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'categories_id' => 'required',
            'author_id' => 'required',
            'status' => 'required'
        ];
        
        if (!$this->validate($rules)) {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
        } else {
            $data = [
                'title' => $this->request->getVar('title'),
                'description' => $this->request->getVar('description'),
                'categories_id' => $this->request->getVar('categories_id'),
                'author_id' => $this->request->getVar('author_id'),
                'status' => $this->request->getVar('status')
            ];
        
            // Handle thumbnail update only if a new file is uploaded
            $file = $this->request->getFile('thumbnail');
            if ($file->isValid() && ! $file->hasMoved()) {
                $fileName = $file->getRandomName();
                $data['thumbnail'] = 'uploads/thumbnail/' . $fileName;
                $file->move('uploads/thumbnail/', $fileName);
            }
        
            $this->blog->update($id, $data);
        
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Blog updated successfully',
                'data' => $data
            ];
        }
        
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->blog->find($id);
        if (!empty($data)) {
            $this->blog->delete($id);
            $response = [
                'status'   => 200,
                'messages' => [
                    'success' => 'blog successfully deleted'
                ],
                'data' => []
            ];
            
        } else {
            $response = [
				'status' => 404,
				"error" => true,
				'messages' => 'No blog found',
				'data' => []
			];
        }
        return $this->respondDeleted($response);
    }
}
