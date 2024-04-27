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
                        <a class="list-group-item list-group-item-action" href="{{route('doctor.dashboard')}}"><span><i class="fa fa-tachometer" aria-hidden="true"></i>
                        </span> Dashboard</a>
                        <a class="list-group-item list-group-item-action" href="{{route('doctor.dashboard.products')}}"><span><i class="fa fa-th-list" aria-hidden="true"></i>
                            </span> Available products</a>
                        <a class="list-group-item list-group-item-action" href="{{route('doctor.dashboard.bookings')}}"><span><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </span> Bookings</a>
                        <a class="list-group-item list-group-item-action bg-success text-white" href="{{route('doctor.dashboard.profile')}}"><span><i class="fa fa-user" aria-hidden="true"></i>
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
                <div class="card-header"><b>Doctor information</b></div>
                <div class="card-body">
                <form action="{{route('doctor.dashboard.update-profile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstname" class="px-1"><small><b>Firstname</b></small></label>
                                    <input class="form-control @error('firstname') is-invalid @enderror" type="text" name="firstname" value="{{ $doctor->firstname }}" required>
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="lastname" class="px-1"><small><b>Lastname</b></small></label>
                                    <input class="form-control @error('lastname') is-invalid @enderror" type="text" name="lastname" value="{{ $doctor->lastname }}" required>
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="px-1"><small><b>Email</b></small></label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $doctor->email }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone" class="px-1"><small><b>Phone</b></small></label>
                                    <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ $doctor->phone }}" required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address" class="px-1"><small><b>Address</b></small></label>
                                    <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" value="{{ $doctor->address }}" required>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-4">
                            @if($doctor->picture)
                                <img src="{{asset('files/' . $doctor->picture)}}" style="min-height:50%;"><br>
                            @else
                                <img src="{{asset('img/undraw_profile.svg')}}"><br>
                            @endif
                            <label for="picture"  class="btn btn-dark btn-sm btn-block">update picture</label>
                            @error('picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input id="picture" name="picture" type="file" style="visibility:hidden;">
                        </div>
                    </div>
                    <div class="px-3">
                        <button type="submit" class="btn btn-success col-md-8">Update profile</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
