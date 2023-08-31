<?php

namespace App\Traits;

trait ResponseAllow
{
    public function responseAllow($data){
        return $this->respond($data)->setStatusCode($data['status']);
    }
}
