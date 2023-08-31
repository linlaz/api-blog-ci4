<?php

namespace App\Validation;

use App\Models\Category;

Class StatusMustPublishedOrDraft{
    public function statusMustPublishedOrDraft(string $status){
        if (!in_array($status,['published', 'draft'])) {
            return false;
        }
        return true;

    }
}