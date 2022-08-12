<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
            <a href="/" class="w-20 h-20 fill-current text-gray-500"><img src="{{ asset('images/logo3.png') }}"
          alt="logo" width="200px" height="80px"></a>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <h4 class="text-center text-success"><b>create your DOCTOR account</b></h4>
    <form method="POST" action="{{ route('doctor.register') }}">
      @csrf

      <!-- License -->
      <div class="mt-2">
        <x-label for="license" :value="__('License')" />

        <x-input id="license" class="block w-full" type="text" name="license" :value="old('license')" required autofocus />
      </div>

      <!-- Name -->
      <div class="mt-2">
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block w-full"
          type="password"
          name="password"
          required autocomplete="new-password" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-input id="password_confirmation" class="block w-full"
          type="password"
          name="password_confirmation" required />
      </div>

      <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('doctor.login') }}">
          {{ __('Already registered?') }}
        </a>

        <x-button class="ml-4 bg-success text-white
        ">
          {{ __('Register') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
