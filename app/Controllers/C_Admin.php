<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class C_Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard'
        ];
        return view('admin/index', $data);
    }
}
