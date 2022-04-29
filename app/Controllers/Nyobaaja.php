<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Nyobaaja extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Coba Aja",
            "name" => "Faqih"
        ];

        echo view('index', $data);
    }
}