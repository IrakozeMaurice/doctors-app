<x-app-layout>
    @section('title', 'Add product')
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
                        <a class="list-group-item list-group-item-action active" href="#"><span><i class="fa fa-plus-square" aria-hidden="true"></i>
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
                <div class="card-header"><b>Add new product</b></div>
                <div class="card-body">
                <form action="{{ route('dashboard.store-product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input class="form-control @error('product_name') is-invalid @enderror" type="text" name="product_name" value="{{ old('product_name') }}" autofocus required>
                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input class="form-control @error('quantity') is-invalid @enderror" type="number" name="quantity" value="{{ old('quantity') }}" required>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity_description">Quantity description</label>
                                <input class="form-control @error('quantity_description') is-invalid @enderror" type="text" name="quantity_description" value="{{ old('quantity_description') }}" required>
                                @error('quantity_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" value="{{ old('price') }}" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price_description">price description</label>
                                <input class="form-control @error('price_description') is-invalid @enderror" type="text" name="price_description" value="{{ old('price_description') }}" required>
                                @error('price_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="place">Location</label>
                                <input class="form-control @error('place') is-invalid @enderror" type="text" name="place" value="{{ old('place') }}" required>
                                @error('place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="period">Period</label>
                                <input class="form-control @error('period') is-invalid @enderror" type="date" name="period" value="{{ old('period') }}" required>
                                @error('period')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="photo">select photo</label>
                                <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" value="{{ old('photo') }}" required>
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between m-auto">
                        <button type="submit" class="btn btn-primary">Add product</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
