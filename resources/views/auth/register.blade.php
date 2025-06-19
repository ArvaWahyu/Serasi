<x-guest-layout>
    {{-- Logo Bulat di Paling Atas --}}
    <div class="flex justify-center mt-6 mb-4">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTIADQ4zEmHUL4_h42vSeAIrILRi6VEcmLiA&s" alt="Logo Serasi" class="w-24 h-24 rounded-full shadow-md border-4 border-red-700">
    </div>
    <form method="POST" action="{{ route('register') }}" id="register-form">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" oninvalid="this.setCustomValidity('Masukkan nama yang benar')" oninput="this.setCustomValidity('')" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" pattern="^[a-zA-Z0-9._%+-]+@teknokrat\.ac\.id$" title="Masukkan email @teknokrat.ac.id" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const registerForm = document.querySelector('form[action="{{ route('register') }}"]');
                    const emailInput = registerForm.querySelector('#email');
                    registerForm.addEventListener('submit', function(event) {
                        const emailValue = emailInput.value;
                        const domainPattern = /^[a-zA-Z0-9._%+-]+@teknokrat\.ac\.id$/;
                        if (!domainPattern.test(emailValue)) {
                            event.preventDefault();
                            emailInput.setCustomValidity('Masukkan email @teknokrat.ac.id');
                            emailInput.reportValidity();
                        } else {
                            emailInput.setCustomValidity('');
                        }
                    });
                    emailInput.addEventListener('invalid', function(event) {
                        const domainPattern = /^[a-zA-Z0-9._%+-]+@teknokrat\.ac\.id$/;
                        if (!event.target.value || !domainPattern.test(event.target.value)) {
                            event.target.setCustomValidity('Masukkan email @teknokrat.ac.id');
                        } else {
                            event.target.setCustomValidity('');
                        }
                    });
                    emailInput.addEventListener('input', function(event) {
                        event.target.setCustomValidity('');
                    });
                });
            </script>
        </div>
        <script>
            const registerForm = document.querySelector('form[action="{{ route('register') }}"]');
            const emailInput = registerForm.querySelector('#email');
            emailInput.addEventListener('invalid', function(event) {
                if (event.target.validity.typeMismatch || event.target.validity.patternMismatch) {
                    event.target.setCustomValidity('Masukan email @teknokrat.ac.id');
                } else {
                    event.target.setCustomValidity('');
                }
            });
            emailInput.addEventListener('input', function(event) {
                event.target.setCustomValidity('');
            });
        </script>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        const registerForm = document.querySelector('form[action="{{ route('register') }}"]');
        const nameInput = registerForm.querySelector('#name');
        nameInput.addEventListener('invalid', function(event) {
            event.target.setCustomValidity('');
            if (!event.target.validity.valid) {
                event.target.setCustomValidity('Masukkan nama yang benar');
            }
        });
        nameInput.addEventListener('input', function(event) {
            event.target.setCustomValidity('');
        });
    </script>
</x-guest-layout>
