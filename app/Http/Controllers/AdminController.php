<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('admin.dashboard');
    }

    public function listFarmers()
    {
        return view('admin.listFarmers');
    }

    public function listDoctors()
    {
        return view('admin.listDoctors');
    }
}
