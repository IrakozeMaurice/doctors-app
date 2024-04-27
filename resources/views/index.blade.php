<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Doctors app - Homepage</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    body {
      margin: 0;
      font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
      font-size: 17px;
      color: #926239;
      line-height: 1.6;
    }

    #showcase {
      background-image: url('{{ asset('images/logo3.png') }}');
      background-size: cover;
      background-position: center;
      height: 60vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      /*text-align:center;*/
      padding: 0 20px;
      opacity: 0.9;
    }

    .divider {
      width: 30%;
      height: 5px;
      background: #008000;
    }

    .letter-spacing {
      letter-spacing: 2px;
      color: #6F8BA4;
    }

    .text-sm {
      font-size: 14px;
    }

    .text-uppercase {
      text-transform: uppercase !important;
    }

    h1 {
      font-family: "Exo", sans-serif;
      font-weight: 400;
    }

    .banner {
      font-size: 30px;
      line-height: 1.2;
      letter-spacing: -1.2px;
      text-transform: capitalize;
      color: #223a66;
    }

    .btn-round-full {
      border-radius: 50px;
    }

    .btn-main-2 {
      background: #008000;
      color: #fff;
    }

    .btn-main-2:hover {
      background: #223a66;
      color: #fff;
    }

    h2 {
      color: #223a66;
    }

    h2,
    .h2 {
      font-size: 34px;
    }
  </style>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
  <!-- Navigation -->
  <div class="container">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex">
          <!-- Logo -->
          <div class="shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
              <img src="{{ asset('images/logo3.png') }}" alt="logo" width="40px" height="40px">
            </a>
          </div>

          <!-- Navigation Links -->
          <div class="hidden space-x-8 sm:-my-px sm:ml-6 sm:flex">
            <h4
              class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-2-xl font-bold leading-5 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
              Legal Traditional Doctors</h4>
          </div>
        </div>

        <div class=" sm:flex sm:items-center sm:ml-6">
          <div align="right" width="48">
            <div>
              <a href="{{ route('login') }}"
                class="text-base font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out mr-3"><u>Log
                  in</u></a>
              <a href="{{ route('register') }}"
                class="text-base font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"><u>Register</u></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Navigation -->

  <!-- Content -->
  <header id="showcase" class="text-dark text-center">
    <div class="col-md-6 bg-white">
      <div class="divider mb-3"></div>
      <span class="text-uppercase text-sm letter-spacing ">Total Health care solution</span>
      <h1 class="mb-2 mt-3 banner">knowledge hub for traditional medicine.</h1>
      <p class="mb-2"><q>88% of all countries are estimated to use traditional medicine, such as herbal medicines,
          acupuncture, yoga, indigenous therapies and others.</q><b>World Health Organization</b>.</p>
      <div class="btn-container text-center">
        <a href="{{ route('doctor.dashboard') }}" class="btn btn-main-2 btn-icon btn-round-full mb-2">For Legal
          Traditional doctors<i class="icofont-simple-right ml-2  "></i></a>
      </div>
    </div>
  </header>
  <div class="container mb-3">
    <div class="row">
      <div class="col-md-4 my-auto">
        <h2>Doctors who use this hub</h2>
      </div>
      <div class="col-md-8">
        <div class="row">
          @foreach ($doctors as $doctor)
            @if ($doctor->picture)
              <div class="col-md-4">
                <div class="card text-center">
                  <img class="card-img-top" src="{{ asset('files/' . $doctor->picture) }}" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title">{{ $doctor->firstname }} {{ $doctor->lastname }}</h4>
                    <p class="card-text">{{ $doctor->address }}</p>
                    <a href="#" class="btn text-white btn-block" style="background-color:#008000;">See Profile</a>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="py-3 container-fluid flex items-center justify-center border-t">
    <div class="text-center text-sm text-gray-500 sm:text-left">
      <div class="flex items-center">
        <span>Made with</span>
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
          <path
            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
          </path>
        </svg>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;By&nbsp;</span>
        <a href="https://github.com" class="ml-1 underline">
          Sandra
        </a>
      </div>
    </div>
    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
      Auca@2022
    </div>
  </div>

  </div>
  </div>
</body>

</html>
