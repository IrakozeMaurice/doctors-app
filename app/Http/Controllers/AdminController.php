<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Farmer;
use App\Models\Product;

class AdminController extends Controller
{

    public function index()
    {
        $totalFarmers = Farmer::all()->count();
        $totalBookings = Booking::all()->count();
        $totalProducts = Product::all()->count();
        return view('admin.dashboard', compact('totalFarmers', 'totalBookings', 'totalProducts'));
    }

    public function listFarmers()
    {
        $farmers = Farmer::all();
        return view('admin.listFarmers', compact('farmers'));
    }

    public function listDoctors()
    {
        $doctors = Doctor::all();
        return view('admin.listDoctors', compact('doctors'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
        request()->validate([
            'certificate' => 'required|unique:doctors,license',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $doctor = Doctor::create([
            'license' => request('certificate'),
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'email' => request('email'),
            'phone' => request('phone'),
            'address' => request('address'),
        ]);

        return back()->with('message', 'doctor added successfully');
    }

    public function edit(Doctor $doctor)
    {
        return view('admin.edit', compact('doctor'));
    }

    public function update(Doctor $doctor)
    {
        request()->validate([
            'certificate' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $doctor->license = request('certificate');
        $doctor->firstname = request('firstname');
        $doctor->lastname = request('lastname');
        $doctor->email = request('email');
        $doctor->phone = request('phone');
        $doctor->address = request('address');

        $doctor->update();

        return back()->with('message', 'doctor updated successfully');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return back()->with('message', 'doctor deleted successfully');
    }
}
