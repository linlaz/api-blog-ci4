<?php

namespace App\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Traits\ResponseAllow;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class BlogController extends ResourceController
{
    use ResponseTrait;
    use ResponseAllow;

    public $blog;
    public $category;
    public function __construct()
    {
        $this->blog = new Blog();
        $this->category = new Category();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $status = $this->request->getVar('status');
        $limit = (int) $this->request->getVar('limit') ?? 0;
        $offset = (int) $this->request->getVar('offset') ?? 0;
        $orderBy = $this->request->getVar('orderBy') ?? 'id';
        $direction = $this->request->getVar('direction') ?? 'DESC';
        $query = $this->blog->orderBy($orderBy, $direction);

        if ($status !== null && $status !== '') {
            $query->where('status', $status);
        }
        $data = $query->findAll($limit, $offset);
        $data = $this->blog->withCategory($data);
        $data = $this->blog->withAuthor($data);

        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'List of blogs',
            'data' => $data
        ];

        return $this->responseAllow($response);
    }



    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $arr = [];
        $data = $this->blog->find($id);
        if (!empty($data)) {
            array_push($arr, $data);
            $data = $this->blog->withCategory($arr);
            $data = $this->blog->withAuthor($data);
            $response = [
                'status' => 200,
                "error" => false,
                'messages' => 'blog finded successfully',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 404,
                "error" => true,
                'messages' => 'No blog found',
                'data' => []
            ];
        }
        return $this->responseAllow($response);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $valid = $this->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'thumbnail' => 'uploaded[thumbnail]|is_image[thumbnail]',
                'categories_id' => 'required|CategoryExist',
                'author_id' => 'required|UserExist',
                'status' => 'required'
            ],
            [
                'categories_id' => [
                    'CategoryExist' => 'category not exists',
                ],
                'author_id' => [
                    'UserExist' => 'user not exists'
                ],
            ]
        );

        if (!$valid) {
            $response = [
                'status' => 400,
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
                'thumbnail' => 'uploads/thumbnail/' . $fileName,
                'categories_id' => $this->request->getVar('categories_id'),
                'author_id' => $this->request->getVar('author_id'),
                'status' => $this->request->getVar('status')
            ];
            $this->blog->insert($data);

            if ($file->isValid() && !$file->hasMoved()) {
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

        return $this->responseAllow($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $valid = $this->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'categories_id' => 'required|CategoryExist',
                'author_id' => 'required|UserExist',
                'status' => 'required'
            ],
            [
                'categories_id' => [
                    'CategoryExist' => 'category not exists',
                ],
                'author_id' => [
                    'UserExist' => 'user not exists'
                ],
            ]
        );

        if (!$valid) {
            $response = [
                'status' => 400,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
        }elseif (is_null($this->blog->find($id))) {
            $response = [
                'status' => 404,
                'error' => true,
                'message' => 'Blog Not Found',
                'data' => []
            ];
        }
         else {
            $data = [
                'title' => $this->request->getVar('title'),
                'description' => $this->request->getVar('description'),
                'categories_id' => $this->request->getVar('categories_id'),
                'author_id' => $this->request->getVar('author_id'),
                'status' => $this->request->getVar('status')
            ];

            $file = $this->request->getFile('thumbnail');
            if (!is_null($file)) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $fileName = $file->getRandomName();
                    $data['thumbnail'] = 'uploads/thumbnail/' . $fileName;
                    $file->move('uploads/thumbnail/', $fileName);
                }
            }

            $this->blog->update($id, $data);

            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Blog updated successfully',
                'data' => $data
            ];
        }

        return $this->responseAllow($response);
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
        return $this->responseAllow($response);
    }
}
