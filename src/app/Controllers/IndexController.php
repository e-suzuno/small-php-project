<?php

namespace App\Controllers;

use App\Helpers\ViewHelper;

class IndexController
{
    public function __construct()
    {
    }

    public function __invoke()
    {
        return ViewHelper::render("index", ["message" => "IndexControllerですよ"]);
    }
}