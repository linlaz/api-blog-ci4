<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\User;
use App\Traits\ResponseAllow;
use CodeIgniter\API\ResponseTrait;

class UserController extends ResourceController
{
    use ResponseTrait;
    use ResponseAllow;

    public $user;
    public function __construct()
    {
        $this->user = new User();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $response = [
			'status' => 200,
			"error" => false,
			'messages' => 'user list',
			'data' => $this->user->findAll()
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
        $data = $this->user->find($id);
        if (!empty($data)) {

			$response = [
				'status' => 200,
				"error" => false,
				'messages' => 'user finded successfully',
				'data' => $data
			];

		}else{
            $response = [
				'status' => 404,
				"error" => true,
				'messages' => 'No user found',
				'data' => []
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
        $rules = [
            'name' => 'required|is_unique[users.name,id,'.$id.']|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email,id,'.$id.']',
        ];
		if (!$this->validate($rules)) {

			$response = [
				'status' => 500,
				'error' => true,
				'message' => $this->validator->getErrors(),
				'data' => []
			];
		} else { 
            $datas = $this->user->find($id);
            if (!empty($datas)) {
                $data = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                ];
                $this->user->update($id, $data);
                $response = [
					'status' => 200,
					'error' => false,
					'message' => 'User updated successfully',
					'data' => $this->user->find($id)
				];
            }else {
                $response = [
					'status' => 404,
					"error" => true,
					'messages' => 'No user found',
					'data' => []
				];
            }
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
        $data = $this->user->find($id);
        if (!empty($data)) {
            $this->user->delete($id);
            $response = [
                'status'   => 200,
                'messages' => [
                    'success' => 'user successfully deleted'
                ],
                'data' => []
            ];
            
        } else {
            $response = [
				'status' => 404,
				"error" => true,
				'messages' => 'No user found',
				'data' => []
			];
        }
        return $this->responseAllow($response);
    }
}
