<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update', $user) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- NIN -->
        <div>
            <x-input-label for="national_insurance_number" :value="__('National Insurance Number')" />
            <x-text-input id="national_insurance_number" name="national_insurance_number" type="text" class="mt-1 block w-full" :value="old('national_insurance_number', $user->national_insurance_number)" />
            <x-input-error class="mt-2" :messages="$errors->get('national_insurance_number')" />
        </div>

        <!-- Phone Number -->
        <div>
            <x-input-label for="phonenumber" :value="__('Phone Number')" />
            <x-text-input id="phonenumber" name="phonenumber" type="text" class="mt-1 block w-full" :value="old('phonenumber', $user->phonenumber)" />
            <x-input-error class="mt-2" :messages="$errors->get('phonenumber')" />
        </div>

        <!-- Address -->
        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)"/>
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <!-- Admin Enabled -->
        @if(Auth::user()->admin==1)
        <div class="mb-6">
            <label for="admin" class="inline-flex items-center">
                <input type="checkbox" name="admin" id="admin" value="1" {{ $user->admin ? 'checked' : '' }} class="form-checkbox">
                <span class="ml-2">Admin</span>
            </label>
        </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

</section>
