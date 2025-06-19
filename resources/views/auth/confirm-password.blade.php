<x-guest-layout>
    {{-- Logo Bulat di Paling Atas --}}
    <div class="flex justify-center mt-6 mb-4">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTIADQ4zEmHUL4_h42vSeAIrILRi6VEcmLiA&s" alt="Logo Serasi" class="w-24 h-24 rounded-full shadow-md border-4 border-red-700">
    </div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
