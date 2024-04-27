<x-app-layout>
    @section('title', 'Doctor - Home')
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
                        <a class="list-group-item list-group-item-action bg-success text-white" href="{{route('doctor.dashboard')}}"><span><i class="fa fa-tachometer" aria-hidden="true"></i>
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
            <div class="card">
                <div class="card-header"><b>Doctor Dashboard</b></div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div>
                        <p class="text-success"><b>Recent bookings</b></p>
                    </div>
                    <div class="row mt-3">
                        @forelse($recentBookings as $booking)
                        <div class="col-4">
                            <a href="{{route('doctor.dashboard.show-booking',$booking->id)}}" class="custom-link">
                                <div class="card text-center">
                                  <div class="card-body">
                                    <img class="img-custom" src="{{ asset('files/' . $booking->product->photo) }}" alt="">
                                    <h5 class="text-center pt-2 text-success"><b>{{$booking->product->name}}</b></h5>
                                  </div>
                                </div>
                            </a>
                        </div>
                        @empty
                        <p class="px-3"><small><b>No recent bookings found</b></small></p>
                        @endforelse
                    </div>
                    @if($recentBookings)
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h6 class="text-dark">Recent bookings details</h6>
                            <table class="table table-hover table-secondary">
                                <tr>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                                @foreach($recentBookings as $booking)
                                  <tr>
                                    <td>{{$booking->product->name}}</td>
                                    <td>{{$booking->product->quantity}} {{$booking->product->quantity_description}}</td>
                                    <td>{{$booking->product->price}} {{$booking->product->price_description}}</td>
                                    <td><b>{{number_format($booking->product->quantity * $booking->product->price)}}</b> Frw</td>
                                  </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    @endif
            </div>
        </div>
    </div>
</div>
</x-app-layout>
