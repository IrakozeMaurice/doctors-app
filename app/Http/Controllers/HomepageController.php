<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class HomepageController extends Controller
{

    public function index()
    {
        $doctors = Doctor::all();
        return view('index', compact('doctors'));
    }
}
