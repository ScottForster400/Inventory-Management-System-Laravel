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



                    i am a graph


                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 pb-4 pt-4 pl-4">
                <div class="">
                    <x-dropdown-button class="float-left !w-24 " >Sort</x-dropdown-button>
                    <div>
                        <x-dropdown-button-body>
                            <x-dropdown-button-li class="w-full">
                                <x-dropdown-button-a>Today</x-dropdown-button-a>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li class="w-full">
                                <x-dropdown-button-a>Last Week</x-dropdown-button-a>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li class="w-full">
                                <x-dropdown-button-a>Last Month</x-dropdown-button-a>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li class="w-full">
                                <x-dropdown-button-a>Last Year</x-dropdown-button-a>
                            </x-dropdown-button-li>
                        </x-dropdown-button-body>
                    </div>
                </div>
            </div>


            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    <x-table>
                        <x-table-head>
                            <x-tr>
                                <x-th>
                                    Day
                                </x-th>
                                <x-th>
                                    Generate Report
                                </x-th>
                            </x-tr>
                        </x-table-head>
                        <x-table-body>


                            @foreach($groupedTransactions as $date=> $transactions)
                                <x-tr>
                                    <x-th>
                                        {{Carbon\Carbon::parse($date)->format('Y/m/d') }}</x-th>
                                    <x-th>
                                        <x-modal-toggle>Generate Report</x-modal-toggle>
                                        <x-modal>
                                            <x-modal-header>Report</x-modal-header>
                                            <x-modal-body>

                                                <x-table>
                                                    <x-table-head>
                                                        <x-tr>
                                                            <x-th>
                                                                Stock ID
                                                            </x-th>
                                                            <x-th>
                                                                Amount
                                                            </x-th>
                                                            <x-th>
                                                                Price(£)
                                                            </x-th>
                                                        </x-tr>
                                                    </x-table-head>
                                                    @foreach ($transactions as $transaction)
                                                        <x-table-body>
                                                                <x-tr>
                                                                    <x-th>
                                                                        {{$transaction->product_id}}
                                                                    </x-th>
                                                                    <x-th>
                                                                        {{$transaction->amount}}
                                                                    </x-th>
                                                                    <x-th>
                                                                        {{$transaction->price}}
                                                                    </x-th>
                                                                </x-tr>
                                                        </x-table-body>
                                                    @endforeach
                                                    <tfoot>
                                                        <tr class="font-semibold text-gray-900 dark:text-white">
                                                            <th scope="row" class="px-6 py-3 text-base">Total</th>
                                                            <td class="px-6 py-3">{{$transactions->sum('amount')}}</td>
                                                            <td class="px-6 py-3">{{$transactions->sum('price');}}</td>

                                                        </tr>
                                                    </tfoot>
                                                </x-table>
                                            </x-modal-body>
                                            <x-modal-footer>Close</x-modal-footer>
                                        </x-modal>
                                    </x-th>
                                </x-tr>
                            @endforeach
                        </x-table-body>
                    </x-table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
