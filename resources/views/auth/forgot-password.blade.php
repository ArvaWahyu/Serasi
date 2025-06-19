<x-guest-layout>
    {{-- Logo Bulat di Paling Atas --}}
    <div class="flex justify-center mt-6 mb-4">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTIADQ4zEmHUL4_h42vSeAIrILRi6VEcmLiA&s" alt="Logo Serasi" class="w-24 h-24 rounded-full shadow-md border-4 border-red-700">
    </div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
