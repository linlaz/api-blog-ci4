<?php

namespace App\Validation;

use App\Models\Category;

Class CategoryExist{
    public function CategoryExist(int $idFk){
        $categoryModel = new Category();
        $checkExist = $categoryModel->find($idFk);
        if (is_null($checkExist)) {
            return false;
        }
        return true;

    }
}