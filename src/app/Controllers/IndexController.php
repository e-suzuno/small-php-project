<?php

namespace App\Controllers;

class IndexController{
    public function __construct()
    {
    }
    public function __invoke()
    {
        return "IndexControllerですよ";
    }
}