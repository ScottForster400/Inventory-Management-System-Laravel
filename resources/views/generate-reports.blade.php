<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Generate Reports') }}
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
                                    Month
                                </x-th>
                                <x-th>
                                    Generate Report
                                </x-th>
                            </x-tr>
                        </x-table-head>
                        <x-table-body>
                            @foreach($transaction as $key => $data)
                                <x-tr>
                                    <x-th>{{$data->transaction_id}}</x-th>
                                    <x-th>{{$data->price}}</x-th>
                                </x-tr>
                            @endforeach
                        </x-table-body>
                    </x-table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>