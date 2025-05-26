<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

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
                        name="password_confirmation"
                        required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- He Qi -->
        <div class="mt-4">
            <x-input-label for="heqi" :value="__('He Qi')" />
            
            <select id="heqi" name="he_qi" class="block mt-1 w-full ..." required>
                <option value="">Pilih He Qi</option>
                <option value="Barat" {{ old('he_qi') == 'Barat' ? 'selected' : '' }}>Barat</option>
                <option value="Utara" {{ old('he_qi') == 'Utara' ? 'selected' : '' }}>Utara</option>
                <option value="Timur" {{ old('he_qi') == 'Timur' ? 'selected' : '' }}>Timur</option>
                <option value="Pusat" {{ old('he_qi') == 'Pusat' ? 'selected' : '' }}>Pusat</option>
            </select>

            <x-input-error :messages="$errors->get('he_qi')" class="mt-2" />
        </div>

        <!-- Default role relawan -->
        <input type="hidden" name="role" value="relawan">


        <!-- Tombol Register -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Tombol Login -->
    <div class="flex justify-center mt-4">
        <a href="{{ route('login') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
            {{ __('Already have an account? Log in here.') }}
        </a>
    </div>
</x-guest-layout>
