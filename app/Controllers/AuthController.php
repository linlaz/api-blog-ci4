<?php

namespace App\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Traits\ResponseAllow;

class AuthController extends BaseController
{
    use ResponseTrait;
    use ResponseAllow;

    public $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function Login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $this->user->where('email', $email)->first();

        if (is_null($user)) {
            $response = [
                'status' => 404,
                'error' => false,
                'message' => 'Invalid username or password',
                'data' => []
            ];
            return $this->responseAllow($response);
        }

        $pwd_verify = password_verify($password, $user['password']);

        if (!$pwd_verify) {
            $response = [
                'status' => 404,
                'error' => false,
                'message' => 'Invalid username or password',
                'data' => []
            ];
            return $this->responseAllow($response);
        }

        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;

        $payload = array(
            "iat" => $iat,
            "exp" => $exp,
            "email" => $user['email'],
        );

        $token = JWT::encode($payload, $key, 'HS256');

        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Login Succesful',
            'data' => [
                'token' => $token,
            ]
        ];

        return $this->responseAllow($response);
    }
    public function register()
    {
        $rules = [
            'name' => 'required|is_unique[users.name]|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]'
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
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $this->user->insert($data);
            $key = getenv('JWT_SECRET');
            $iat = time();
            $exp = $iat + 3600;

            $payload = array(
                "iat" => $iat,
                "exp" => $exp,
                "email" => $this->request->getVar('email'),
            );

            $token = JWT::encode($payload, $key, 'HS256');
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'User added successfully',
                'data' => [
                    'token' => $token
                ],
            ];
        }
        return $this->responseAllow($response);
    }
}
