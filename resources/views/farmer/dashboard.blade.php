<x-app-layout>
    @section('title', 'Home')
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
                        <a class="list-group-item list-group-item-action active" href="#"><span><i class="fa fa-tachometer" aria-hidden="true"></i>
                        </span> Dashboard</a>
                        <a class="list-group-item list-group-item-action" href="{{route('dashboard.create-product')}}"><span><i class="fa fa-plus-square" aria-hidden="true"></i>
                        </span> Add product</a>
                        <a class="list-group-item list-group-item-action" href="{{route('dashboard.list-products')}}">
                            <span><i class="fa fa-th-list" aria-hidden="true"></i>
                            </span> All products</a>
                        <a class="list-group-item list-group-item-action" href="{{route('dashboard.list-bookings')}}"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </span> Bookings</a>
                        <a class="list-group-item list-group-item-action" href="{{route('dashboard.profile')}}"><span><i class="fa fa-user" aria-hidden="true"></i>
                        </span> My Profile</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Farmer Dashboard</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <p class="text-primary"><b>Recently added products</b></p>
                    </div>
                    <div class="row mt-3">
                        @forelse($recentProducts as $product)
                        <div class="col-4">
                            <a href="#" class="custom-link">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img class="img-custom" src="{{ asset('files/' . $product->photo) }}" alt="">
                                        <h5 class="text-center pt-2"><b>{{$product->name}}</b></h5>
                                        <p class="text-dark"><b>{{$product->quantity}} {{$product->quantity_description}}</b></p class="text-dark">
                                    </div>
                                </div>
                            </a>
                        </div>
                        @empty
                        <p class="px-3"><small><b>No products found</b></small></p>
                        @endforelse
                    </div>
                    @if(count($mostBookings) > 0)
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h6 class="text-dark">Most bookings</h6>
                                <table class="table table-hover table-light">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th class="text-center">Product name</th>
                                        <th class="text-center">N<sup>o</sup> of Bookings</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($mostBookings as $booking)
                                    @if($booking->bookings == 0)
                                      @continue
                                    @endif
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="text-center">{{$booking->name}}</td>
                                        <td class="text-center">{{$booking->bookings}}</td>
                                        <td class="text-center"><a href="{{route('dashboard.show-product-bookings',$booking->id)}}"><u>View</u></a></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- <div class="col-md-6">
                                <h6 class="text-dark">Other details</h6>
                                <table class="table table-hover table-secondary">
                                            <tr>
                                                <td>lorem ipsum</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>lorem ipsum</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>lorem ipsum</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>lorem ipsum</td>
                                                <td>0</td>
                                            </tr>
                                </table>
                            </div> -->
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>
</x-app-layout>
