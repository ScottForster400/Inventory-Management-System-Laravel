

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <b>New Employee:</b>
                    <form method="POST" action="{{ route('register') }}">

                        <div class="flex items-center justify-left">
                            <!-- Admin -->
                            <div class="pl-2 pt-2">
                                <x-input-label for="admin" :value="__('Admin')" />
                            </div>
                            <div class="pl-2 pt-2">
                                <x-text-input id="admin" class="block mt-1 w-4" type="checkbox" name="admin" :value="old('admin')" required autofocus autocomplete="admin" />
                                <x-input-error :messages="$errors->get('admin')" class="mt-2" />
                            </div>
                        </div>

                        @csrf

                        <x-table>
                            <x-table-body>
                                <x-tr>
                                    <x-th>
                                        <!-- Name -->
                                        <div class="mt-4">
                                            <x-input-label for="name" :value="__('Name')" />
                                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                    </x-th>

                                    <x-th>
                                        <!-- Email Address -->
                                        <div class="mt-4">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </x-th>
                                </x-tr>

                                <x-tr>
                                    <x-th>
                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password" :value="__('Password')" />

                                            <x-text-input id="password" class="block mt-1 w-full"
                                                            type="password"
                                                            name="password"
                                                            required autocomplete="new-password" />

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </x-th>

                                    <x-th>
                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                            type="password"
                                                            name="password_confirmation" required autocomplete="new-password" />

                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </x-th>
                                </x-tr>

                                <x-tr>
                                    <x-th>
                                        <!-- National Insurance Number -->
                                        <div class="mt-4">
                                            <x-input-label for="national_insurance_number" :value="__('National Insurance Number')" />
                                            <x-text-input id="national_insurance_number" class="block mt-1 w-full" type="text" name="national_insurance_number" :value="old('national_insurance_number')" required autofocus autocomplete="national_insurance_number" />
                                            <x-input-error :messages="$errors->get('national_insurance_number')" class="mt-2" />
                                        </div>
                                    </x-th>

                                    <x-th>
                                        <!-- Phone Number -->
                                        <div class="mt-4">
                                            <x-input-label for="phonenumber" :value="__('Phone Number')" />
                                            <x-text-input id="phonenumber" class="block mt-1 w-full" type="tel" name="phonenumber" :value="old('phonenumber')" required autofocus autocomplete="phonenumber" />
                                            <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
                                        </div>
                                    </x-th>
                                </x-tr>
                                <x-tr>

                                    <x-th>
                                        <!-- Date of Birth -->
                                        <div class="mt-4">
                                            <x-input-label for="dob" :value="__('Date of Birth')" />
                                            <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autofocus autocomplete="dob" />
                                            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                                        </div>
                                    </x-th>

                                    <x-th>
                                        <!-- Address -->
                                        <div class="mt-4">
                                            <x-input-label for="address" :value="__('Address')" />
                                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                        </div>
                                    </x-th>
                                </x-tr>
                            </x-table-body>
                        </x-table>

                        <div class="flex items-center justify-end mt-4">


                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ URL::previous() }}">
                                {{ __('Previous Page') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
