@include('partials.adminHeader')

<div class="container">
  <!-- Content Row -->
  <div class="row">
    <!-- Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                total farmers
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ $totalFarmers }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-xs font-weight-bold text-success text-uppercase mb-1">
                total bookings
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ $totalBookings }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Card Example -->
    <div class="col-xl-4 col-md-4 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-xs font-weight-bold text-info text-uppercase mb-1">
                total products
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div
                    class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    {{ $totalProducts }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i
                class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@include('partials.adminFooter')
