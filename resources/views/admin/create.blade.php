@include('partials.adminHeader')
<!-- Begin Page Content -->
<div style="width:70%; margin:auto;">
<!-- Page Heading -->
  <div
    class="mb-4">
    <p class="mb-2 text-center"><b>Add doctor</b></p><hr>
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
      <!-- <a href="#" class=""><img
          src="{{ asset('images/aucaLogo.png') }}"
          alt="Auca logo"></a> -->
    </div>
  </div>
  <div style="width:70%;margin: auto;">
  	@if (session('message'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('message') }}
        </div><br>
    @endif
  	<form action="{{ route('admin.dashboard.store-doctor') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_name">Certificate Number</label>
                                <input class="form-control @error('certificate') is-invalid @enderror" type="text" name="certificate" value="{{ old('certificate') }}" autofocus required>
                                @error('certificate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Firstname</label>
                                <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" required></input>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Lastname</label>
                                <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" required></input>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required></input>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Phone</label>
                                <input name="phone" class="form-control @error('phone') is-invalid @enderror" required></input>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="place">Address</label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" value="{{ old('address') }}" required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between m-auto">
                        <button type="submit" class="btn btn-primary">Add doctor</button>
                    </div>
                </form>
  </div>
</div>
</div>
@include('partials.adminFooter')
