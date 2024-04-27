<x-app-layout>
    @section('title', 'Doctor - product details')
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
                        <a class="list-group-item list-group-item-action" href="{{route('doctor.dashboard')}}"><span><i class="fa fa-tachometer" aria-hidden="true"></i>
                        </span> Dashboard</a>
                        <a class="list-group-item list-group-item-action" href="{{route('doctor.dashboard.products')}}"><span><i class="fa fa-th-list" aria-hidden="true"></i>
                            </span> Available products</a>
                        <a class="list-group-item list-group-item-action" href="{{route('doctor.dashboard.bookings')}}"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </span> Bookings</a>
                        <a class="list-group-item list-group-item-action" href="{{route('doctor.dashboard.profile')}}"><span><i class="fa fa-user" aria-hidden="true"></i>
                        </span> My Profile</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card" style="min-height: 100%">
                <div class="card-header">
                    <b>Viewing {{ $product->name }}</b>
                    <a href="javascript: history.go(-1)"><span class="float-right fa fa-backward"> Back</span></a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-light table-responsive">
                                <tbody>
                                    <tr>
                                        <td>Product name:</td>
                                        <td>{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Product description:</td>
                                        <td>{{ $product->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Quantity:</td>
                                        <td>{{ $product->quantity }} {{ $product->quantity_description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Price:</td>
                                        <td>{{ $product->price }} {{ $product->price_description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Location:</td>
                                        <td>{{ $product->place }}</td>
                                    </tr>
                                    <tr>
                                        <td>Period:</td>
                                        <td>{{ $product->period }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <a href="{{asset('files/' . $product->photo)}}" target="_blank">
                                <img src="{{asset('files/' . $product->photo)}}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>