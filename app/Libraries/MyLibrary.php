<?php

namespace App\Libraries;

use App\Controllers\BaseController;

class MyLibrary extends BaseController
{
    public function input($inputan)
    {
        $this->request->getVar($inputan);
    }
}
