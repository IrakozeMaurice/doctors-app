<x-app-layout>
    @section('title', 'Farmer - product bookings')
    <x-slot name="dropdown">
        fffn
    </x-slot>
<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-4 display-none">
            <div class="card" style="min-height: 100%">
                {{--  mobile nav  --}}
                <div class="card-header"><b>Menu</b></div>

                <div class="card-body p-0">
                    <ul class="list-group">
                        <a class="list-group-item list-group-item-action" href="{{route('dashboard')}}"><span><i class="fa fa-tachometer" aria-hidden="true"></i>
                        </span> Dashboard</a>
                        <a class="list-group-item list-group-item-action" href="{{route('dashboard.create-product')}}"><span><i class="fa fa-plus-square" aria-hidden="true"></i>
                        </span> Add product </a>
                        <a class="list-group-item list-group-item-action" href="{{route('dashboard.list-products')}}"><span><i class="fa fa-th-list" aria-hidden="true"></i>
                            </span> All products </a>
                        <a class="list-group-item list-group-item-action" href="{{route('dashboard.list-bookings')}}"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </span> Bookings</a>
                        <a class="list-group-item list-group-item-action" href="{{route('dashboard.profile')}}"><span><i class="fa fa-user" aria-hidden="true"></i>
                        </span> My Profile</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card" style="min-height: 100%">
                <div class="card-header">
                    <b>Product Bookings</b>
                    <a href="javascript: history.go(-1)"><span class="float-right fa fa-backward"> Back</span></a>
                </div>

                <div class="card-body">
                    @foreach($bookings as $booking)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-header">
                                <p><b>Booking Date: </b>{{$booking->booking_date}}</p><hr>
                            <table class="table table-light table-responsive">
                                <tbody>
                                    <tr>
                                        <td>Product name:</td>
                                        <td>{{ $booking->product->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Product description:</td>
                                        <td>{{ $booking->product->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Quantity:</td>
                                        <td>{{ $booking->quantity }} {{ $booking->product->quantity_description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Price:</td>
                                        <td>{{ $booking->product->price }} {{ $booking->product->price_description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total price:</td>
                                        <td>{{ number_format($booking->product->price * $booking->quantity) }} frw</td>
                                    </tr>
                                    <tr>
                                        <td>Location:</td>
                                        <td>{{ $booking->product->place }}</td>
                                    </tr>
                                    <tr>
                                        <td>Period:</td>
                                        <td>{{ $booking->product->period }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-header">
                                <p><b>Doctor Information</b></p><hr>
                                <p><b>Doctor names: </b>{{$booking->doctor->firstname}} {{$booking->doctor->lastname}}</p>
                                <p><b>Phone: </b>{{$booking->doctor->phone}}</p>
                                <p><b>Email: </b>{{$booking->doctor->email}}</p>
                                <p><b>Address: </b>{{$booking->doctor->address}}</p>
                                <a href="{{asset('files/' . $booking->doctor->picture)}}" target="_blank">
                                <img src="{{asset('files/' . $booking->doctor->picture)}}">
                            </a>
                            </div>
                        </div>
                    </div><hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>