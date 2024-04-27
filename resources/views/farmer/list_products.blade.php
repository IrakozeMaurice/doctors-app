<x-app-layout>
    @section('title', 'All products')
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
                        <a class="list-group-item list-group-item-action active" href="#"><span><i class="fa fa-th-list" aria-hidden="true"></i>
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
                <div class="card-header"><b>All products</b></div>
                <div class="card-body">
                    <table id="myTable" class="table table-striped table-inverse table-responsive-sm">
                        <thead class="thead-inverse">
                            <tr>
                                <th>#</th>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td class="text-center" style="line-height: 60px;">{{ $loop->iteration }}</td>
                                    <td class="text-center" style="line-height: 60px;">{{ $product->name }}</td>
                                    <td class="text-center" style="line-height: 60px;">{{ $product->quantity }} {{ $product->quantity_description }}</td>
                                    <td class="text-center" style="line-height: 60px;">{{ $product->price }} {{ $product->price_description }}</td>
                                    <td class="text-center">
                                        <img src="{{asset('files/' . $product->photo)}}" style="width: 110px;height: 60px;">
                                    </td>
                                    <td style="line-height: 60px;">
                                        <a href="{{route('dashboard.show-product', $product->id)}}"  class="btn btn-outline-light" title="view">
                                            <i class="fa fa-eye text-secondary"></i>
                                        </a>
                                        <a href="{{route('dashboard.edit-product', $product->id)}}" class="btn btn-outline-light" title="edit">
                                            <i class="fa fa-pencil text-secondary"></i>
                                        </a>
                                        <form action="{{route('dashboard.delete-product', $product->id)}}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-outline-light" title="delete">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
