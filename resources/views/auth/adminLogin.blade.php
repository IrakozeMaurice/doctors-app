<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
            <a href="/" class="w-20 h-20 fill-current text-gray-500"><img src="{{ asset('images/logo3.png') }}"
          alt="logo" width="200px" height="80px"></a>
        </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <h4 class="text-center text-success"><b>You are signing in as ADMIN</b></h4>
    <form method="POST" action="{{ route('admin.store') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
          autofocus />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full"
          type="password"
          name="password"
          required autocomplete="current-password" />
      </div>
      <div class="flex items-center justify-end mt-4">
        <x-button class="ml-3 bg-success text-white">
          {{ __('Log in') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
