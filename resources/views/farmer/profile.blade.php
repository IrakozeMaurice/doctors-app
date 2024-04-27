<x-app-layout>
    @section('title', 'Account information')
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
            @if (session('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card" style="min-height: 100%">
                <div class="card-header"><b>User information</b></div>
                <div class="card-body">
                <form action="{{route('farmer.dashboard.update-profile')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname" class="px-1"><small><b>Firstname</b></small></label>
                                <input class="form-control @error('firstname') is-invalid @enderror" type="text" name="firstname" value="{{ $user->firstname }}" required>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname" class="px-1"><small><b>Lastname</b></small></label>
                                <input class="form-control @error('lastname') is-invalid @enderror" type="text" name="lastname" value="{{ $user->lastname }}" required>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="px-1"><small><b>Email</b></small></label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $user->email }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone" class="px-1"><small><b>Phone</b></small></label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ $user->phone }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address" class="px-1"><small><b>Address</b></small></label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" value="{{ $user->address }}" required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between m-auto">
                        <button type="submit" class="btn btn-primary">Update profile</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>
