<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\BeforeValidException;
use CodeIgniter\API\ResponseTrait;

class AuthFilter implements FilterInterface
{
    use ResponseTrait;

    public function before(RequestInterface $request, $arguments = null)
    {
        $key = getenv('JWT_SECRET');
        $header = $request->getHeaderLine("Authorization");
        $token = null;

        if (!empty($header)) {
            if (preg_match('/Bearer\s(\S+)/', $header, $matches)) {
                $token = $matches[1];
            }
        }

        if (is_null($token) || empty($token)) {
            return $this->respondUnauthorized('Must Login');
        }

        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
        } catch (ExpiredException $ex) {
            return $this->respondUnauthorized('Token has expired');
        } catch (SignatureInvalidException $ex) {
            return $this->respondUnauthorized('Invalid token signature');
        } catch (BeforeValidException $ex) {
            return $this->respondUnauthorized('Token not yet valid');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Kosongkan, jika tidak ada manipulasi respons yang diperlukan.
    }

    private function respondUnauthorized($message)
    {
        $json = [
            "success"=> false,
            "code"=> 401,
            'error' => false,
            'message' => $message,
            'data' => []
        ];
        $response = service('response');
        $response->setStatusCode(401);
        $response->setHeader("WWW-Authenticate", "Bearer Token");
        $response->setBody(json_encode($json));

        return $response;
    }
}
