<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        return view('welcome', $datos);
    }
}
