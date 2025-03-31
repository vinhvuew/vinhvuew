<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\Controllers;

class DashboardController extends Controllers
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
