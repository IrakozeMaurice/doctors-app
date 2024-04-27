<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Doctors App - @yield('title')</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  </link>
  <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/custom.js') }}" defer></script>
  <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <!-- <script type="application/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script> -->
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
</head>

<body class="font-sans antialiased">
  <div class="flex flex-col min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Content -->
    <main class="mb-auto">
      {{ $slot }}
    </main>
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
  <script type="application/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script type="application/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <script type="application/javascript">
      $(document).ready(function() {
          // $.noConflict();
          $('#tableSearch').DataTable();
      });
</script>
</body>

</html>
