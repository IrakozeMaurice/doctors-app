<x-app-layout>
  @section('title', 'Doctor - Available products')
  <x-slot name="dropdown">
    fffn
  </x-slot>
  <div class="container-fluid">
    <div class="row mt-4 justify-content-center">
      <div class="col-md-3 display-none">
        <div class="card">
          {{--  mobile nav  --}}
          <div class="card-header"><b>Menu</b></div>

          <div class="card-body p-0">
            <ul class="list-group">
              <a class="list-group-item list-group-item-action" href="{{ route('doctor.dashboard') }}"><span><i
                    class="fa fa-tachometer" aria-hidden="true"></i>
                </span> Dashboard</a>
              <a class="list-group-item list-group-item-action bg-success text-white"
                href="{{ route('doctor.dashboard.products') }}"><span><i class="fa fa-th-list" aria-hidden="true"></i>
                </span> Available products</a>
              <a class="list-group-item list-group-item-action" href="{{ route('doctor.dashboard.bookings') }}"><span><i
                    class="fa fa-shopping-cart" aria-hidden="true"></i>
                </span> Bookings</a>
              <a class="list-group-item list-group-item-action" href="{{ route('doctor.dashboard.profile') }}"><span><i
                    class="fa fa-user" aria-hidden="true"></i>
                </span> My Profile</a>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        @if (session('error'))
          <div class="alert alert-danger text-center" role="alert">
            {{ session('error') }}
          </div>
        @endif
        @if (session('message'))
          <div class="alert alert-success text-center" role="alert">
            {{ session('message') }}
          </div>
        @endif
        <div class="card" style="min-height: 100%">
          <div class="card-header"><b>All products</b></div>
          <div class="card-body">
            <table id="tableSearch" class="table table-striped table-inverse table-responsive w-full">
              <thead class="thead-inverse">
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Product name</th>
                  <th class="text-center">Available Quantity</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Photo</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td class="text-center" style="line-height: 60px;">{{ $loop->iteration }}</td>
                    <td class="text-center" style="line-height: 60px;">
                      <a
                        href="{{ route('doctor.dashboard.show-product', $product->id) }}"><u>{{ $product->name }}</u></a>
                    </td>
                    <td class="text-center" style="line-height: 60px;">{{ $product->quantity }}
                      {{ $product->quantity_description }}</td>
                    <td class="text-center" style="line-height: 60px;">{{ $product->price }}
                      {{ $product->price_description }}</td>
                    <td class="text-center">
                      <img src="{{ asset('files/' . $product->photo) }}" style="width: 110px;height: 60px;">
                    </td>
                    <td style="line-height: 60px;">
                      <button type="button" class="btn btn-success btn-sm py-0" data-toggle="modal"
                        data-target="#modal{{ $product->id }}">Book</button>

                      <!-- Modal -->
                      <div class="modal fade" id="modal{{ $product->id }}" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Book product</h5>
                            </div>
                            <div class="modal-body py-0">
                              <div style="width:50%;margin: auto;">
                                <form action="{{ route('doctor.dashboard.book-product', $product->id) }}"
                                  method="POST"
                                  class="mb-2">
                                  @csrf
                                  <div class="form-group mb-0">
                                    <label class="mb-0" for="quantity"><small><b>Quantity</b></small></label>
                                    <input class="form-control @error('quantity') is-invalid @enderror" type="number"
                                      name="quantity" value="{{ old('quantity') }}" required>
                                    @error('quantity')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                  </div>
                                  <button type="submit" class="btn btn-success">Book product</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
