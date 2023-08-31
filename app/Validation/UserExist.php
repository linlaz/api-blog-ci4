<?php

namespace App\Validation;

use App\Models\User;

Class UserExist{
    public function UserExist(int $idFk){
        $userModel = new User();
        $checkExist = $userModel->find($idFk);
        if (is_null($checkExist)) {
            return false;
        }
        return true;

    }
}