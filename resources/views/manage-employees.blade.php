<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Employees') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">



                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-table>
                        <x-table-head>
                            <x-tr>
                                <x-th>
                                    Employee
                                </x-th>
                                <x-th>
                                    Edit
                                </x-th>
                                <x-th>
                                    Delete
                                </x-th>
                            </x-tr>
                        </x-table-head>
                        <x-table-body>
                                <x-tr>
                                    <x-th>employee id:</x-th>
                                    <x-th>
                                        <x-responsive-nav-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-responsive-nav-link>
                                    </x-th>
                                </x-tr>

                        </x-table-body>
                    </x-table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>