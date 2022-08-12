<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="w-20 h-20 fill-current text-gray-500"><img src="{{ asset('images/logo3.png') }}"
          alt="logo" width="200px" height="80px"></a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <h4 class="text-center text-success"><b>create new FARMER account</b></h4>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row mt-2">
                <div class="col-md-6">
                    <!-- Firstname -->
                    <div>
                        <x-label for="firstname" :value="__('First Name')" />

                        <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" required autofocus />
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Lastname -->
                    <div>
                        <x-label for="lastname" :value="__('Last Name')" />

                        <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" required />
                    </div>
                </div>
            </div>
            <!-- Phone -->
            <div class="mt-2">
                <x-label for="phone" :value="__('phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" required />
            </div>

            <!-- Email Address -->
            <div class="mt-2">
                <label for="email">Email <small><b>(optional)</b></small></label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email"  />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="bg-success text-white">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>