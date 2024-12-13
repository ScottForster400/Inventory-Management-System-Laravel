<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Manage Employees') }}
                </h2>
            </div>

            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{$locationBranch}}
                </h2>
            </div>

        </div>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between">


                <div class="flex-none w-2/12 min-w-40">
                    <x-search-bar>Search</x-search-bar>
                </div>

                <div class="flex-none w-44 pb-4">
                    <x-nav-link :href="route('create.employee')" :active="request()->routeIs('create.employee')">
                        {{ __('Create Employee') }}
                    </x-nav-link>

                </div>

            </div>


            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900 dark:text-gray-100">

                        <x-table>
                            <x-table-head>
                                <x-tr class="max-md:hidden">
                                    <x-th>Employee</x-th>
                                    <x-th>Employee ID</x-th>
                                    <x-th>Edit</x-th>
                                </x-tr>

                                <tr class="sm:hidden">
                                    <x-th>Emp</x-th>
                                    <x-th>Edit</x-th>
                                </tr>
                            </x-table-head>

                            <x-table-body>
                                @foreach($sameBranchUsers as $user)
                                    <x-tr class="max-md:hidden">
                                        <x-th>{{ $user->name }}</x-th>
                                        <x-th>{{ $user->id }}</x-th>
                                        <x-th>
                                            <x-nav-link :href="route('profile.edit', $user)" :active="request()->routeIs('profile.edit')">
                                                {{ __('Edit Employee') }}
                                            </x-nav-link>
                                        </x-th>
                                    </x-tr>

                                    <x-tr class="sm:hidden">
                                        <x-th>{{ $user->name }}</x-th>
                                        <x-th>
                                            <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                                                {{ __('Edit Employee') }}
                                            </x-nav-link>
                                        </x-th>
                                    </x-tr>


                                @endforeach
                            </x-table-body>
                        </x-table>


                        <div class="w-full pt-3 max-md:px-4">
                        {{$sameBranchUsers->links()}}
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
