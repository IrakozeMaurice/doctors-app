<x-app-layout>
  @section('title', 'Doctor - All boookings')
  <x-slot name="dropdown">
    fffn
  </x-slot>
  <div class="container-fluid">
    <div class="row mt-4 justify-content-center">
      <div class="col-md-3 display-none">
        <div class="card" style="min-height: 100%">
          {{--  mobile nav  --}}
          <div class="card-header"><b>Menu</b></div>

          <div class="card-body p-0">
            <ul class="list-group">
              <a class="list-group-item list-group-item-action" href="{{ route('doctor.dashboard') }}"><span><i
                    class="fa fa-tachometer" aria-hidden="true"></i>
                </span> Dashboard</a>
              <a class="list-group-item list-group-item-action" href="{{ route('doctor.dashboard.products') }}"><span><i
                    class="fa fa-th-list" aria-hidden="true"></i>
                </span> Available products</a>
              <a class="list-group-item list-group-item-action bg-success text-white"
                href="{{ route('doctor.dashboard.bookings') }}"><span><i class="fa fa-shopping-cart"
                    aria-hidden="true"></i>
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
          <div class="card-header"><b>All bookings</b></div>
          <div class="card-body">
            <table id="myTable" class="table table-striped table-inverse table-responsive-sm">
              <thead class="thead-inverse">
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Product name</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Total Price</th>
                  <th class="text-center">Photo</th>
                  <th class="text-center">Details</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($bookings as $booking)
                  <tr>
                    <td class="text-center" style="line-height: 60px;">{{ $loop->iteration }}</td>
                    <td class="text-center" style="line-height: 60px;">{{ $booking->product->name }}</td>
                    <td class="text-center" style="line-height: 60px;">{{ $booking->product->quantity }}
                      {{ $booking->product->quantity_description }}</td>
                    <td class="text-center" style="line-height: 60px;">{{ $booking->product->price }}
                      {{ $booking->product->price_description }}</td>
                    <td class="text-center" style="line-height: 60px;">
                      <b>{{ number_format($booking->product->quantity * $booking->product->price) }}</b> Frw</td>
                    <td class="text-center">
                      <img src="{{ asset('files/' . $booking->product->photo) }}" style="width: 110px;height: 60px;">
                    </td>
                    <td style="line-height: 60px;">
                      <a href="{{ route('doctor.dashboard.show-booking', $booking->id) }}"><u>View details</u></a>
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
