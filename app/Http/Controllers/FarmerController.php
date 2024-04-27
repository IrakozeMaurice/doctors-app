<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;
use App\Models\Booking;
use App\Models\Product;

class FarmerController extends Controller
{
    

    public function index()
    {
        // get farmer
        $farmer = Farmer::where('phone',auth()->user()->phone)->first();

        // get farmer's recent products
        $recentProducts = Product::where('farmer_id',$farmer->id)
                                   ->orderBy('created_at','desc')
                                   ->take(3)
                                   ->get();
        // get farmer's most booked products
        $mostBookings = Product::where('farmer_id',$farmer->id)
                             ->orderBy('bookings','desc')
                             ->take(3)
                             ->get();

        return view('farmer.dashboard',compact('recentProducts','mostBookings'));
    }

    public function listProducts()
    {
        // get farmer
        $farmer = Farmer::where('phone',auth()->user()->phone)->first();
        $products = $farmer->products;
        return view('farmer.list_products',compact('products'));
    }

    public function createProduct()
    {
        return view('farmer.add_product');
    }

    public function storeProduct()
    {
        
        request()->validate([
            'product_name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'quantity_description' => 'required',
            'price' => 'required',
            'price_description' => 'required',
            'place' => 'required',
            'period' => 'required',
            'photo' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        // get farmer
        $farmer = Farmer::where('phone',auth()->user()->phone)->first();
        // save photo
        if (request()->hasfile('photo')) {
            $photo = time() . '_' . request()->file('photo')->getClientOriginalName();
            $cvpath = request()->file('photo')->move('files', $photo);
        }
        $product = Product::create([
            'farmer_id' => $farmer->id,
            'name' => request('product_name'),
            'description' => request('description'),
            'quantity' => request('quantity'),
            'quantity_description' => request('quantity_description'),
            'price' => request('price'),
            'price_description' => request('price_description'),
            'place' => request('place'),
            'period' => request('period'),
            'photo' => $photo
        ]);

        return back()->with('message', 'Product added successfully');
    }

    public function showProduct(Product $product)
    {
        return view('farmer.show_product',compact('product'));
    }

    public function showProductBookings(Product $product)
    {
        $bookings = Booking::where('product_id',$product->id)
                            ->orderBy('booking_date','desc')
                            ->get();
        return view('farmer.show_product_bookings',compact('bookings'));
    }

    public function showBooking(Booking $booking)
    {
        return view('farmer.show_booking',compact('booking'));
    }

    public function editProduct(Product $product)
    {
        return view('farmer.edit_product',compact('product'));
    }

    public function updateProduct(Product $product)
    {
        request()->validate([
            'product_name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'quantity_description' => 'required',
            'price' => 'required',
            'price_description' => 'required',
            'place' => 'required',
            'period' => 'required',
            'photo' => 'file|mimes:jpg,jpeg,png',
        ]);

        $product->name = request('product_name');
        $product->description = request('description');
        $product->quantity = request('quantity');
        $product->quantity_description = request('quantity_description');
        $product->price = request('price');
        $product->price_description = request('price_description');
        $product->place = request('place');
        $product->period = request('period');
        // save photo if changed
        if (request()->hasfile('photo')) {
            $photo = time() . '_' . request()->file('photo')->getClientOriginalName();
            $cvpath = request()->file('photo')->move('files', $photo);
            // update photo
            $product->photo = $photo;
        }

        // update product
        $product->update();

        return back()->with('message','product updated successfully');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();

        return back()->with('message','product deleted successfully');
    }

    public function listBookings()
    {
        $farmer = Farmer::where('phone',auth()->user()->phone)->first();
        $productIds = Product::where('farmer_id',$farmer->id)->pluck('id');
        $bookings = Booking::whereIn('product_id',$productIds)->get();
        
        return view('farmer.list_bookings',compact('bookings'));
    }

    public function profile()
    {
        $user = Farmer::where('phone',auth()->user()->phone)->first();
        return view('farmer.profile',compact('user'));
    }

    public function updateProfile()
    {
        request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        // get farmer
        $farmer = Farmer::where('phone',auth()->user()->phone)->first();
        $farmer->firstname = request('firstname');
        $farmer->lastname = request('lastname');
        $farmer->email = request('email');
        $farmer->phone = request('phone');
        $farmer->address = request('address');

        // update farmer info
        $farmer->update();

        return back()->with('message','profile updated successfully');
    }
}

