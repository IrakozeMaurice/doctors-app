<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Booking;
use App\Models\Product;
use Carbon\Carbon;

class DoctorController extends Controller
{

    public function index()
    {
        // dd(Carbon::now()->format('d-M-Y'));
        $doctor = Doctor::where('license', auth()->guard('doctor')->user()->license)->first();
        $recentBookings = Booking::where('doctor_id', $doctor->id)->orderBy('created_at', 'desc')->take(3)->get();
        return view('doctor.dashboard', compact('recentBookings'));
    }

    public function listProducts()
    {
        $products = Product::where('quantity', '>', 0)->orderBy('updated_at', 'desc')->get();
        return view('doctor.list_products', compact('products'));
    }

    public function listBookings()
    {
        $doctor = Doctor::where('license', auth()->guard('doctor')->user()->license)->first();
        $bookings = Booking::where('doctor_id', $doctor->id)->get();
        return view('doctor.list_bookings', compact('bookings'));
    }

    public function showProduct(Product $product)
    {
        return view('doctor.show_product', compact('product'));
    }

    public function showBooking(Booking $booking)
    {
        return view('doctor.show_booking', compact('booking'));
    }

    public function bookProduct(Product $product)
    {
        request()->validate([
            'quantity' => 'required',
        ]);

        // check if quantity available
        if (request('quantity') > $product->quantity) {
            return back()->with('error', 'Quantity is more than available');
        }

        // get doctor
        $doctor = Doctor::where('license', auth()->guard('doctor')->user()->license)->first();

        // create new booking
        $booking = Booking::create([
            'product_id' => $product->id,
            'doctor_id' => $doctor->id,
            'quantity' => request('quantity'),
            'booking_date' => Carbon::now(),
        ]);

        // update product quantity
        $product->quantity = $product->quantity - request('quantity');
        $product->update();

        // increment product No of bookings
        $product->bookings = $product->bookings + 1;
        $product->update();

        return back()->with('message', 'Product booked successfully');
    }

    public function profile()
    {
        $doctor = Doctor::where('license', auth()->guard('doctor')->user()->license)->first();
        $user = auth()->guard('doctor')->user();
        return view('doctor.profile', compact('user', 'doctor'));
    }

    public function updateProfile()
    {
        request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'picture' => 'file|mimes:jpg,jpeg,png',
        ]);

        // get doctor
        $doctor = Doctor::where('license', auth()->guard('doctor')->user()->license)->first();
        $doctor->firstname = request('firstname');
        $doctor->lastname = request('lastname');
        $doctor->email = request('email');
        $doctor->phone = request('phone');
        $doctor->address = request('address');
        // save photo if changed
        if (request()->hasfile('picture')) {
            $picture = time() . '_' . request()->file('picture')->getClientOriginalName();
            $cvpath = request()->file('picture')->move('files', $picture);
            // update picture
            $doctor->picture = $picture;
        }

        // update doctor info
        $doctor->update();

        return back()->with('message', 'profile updated successfully');
    }
}
