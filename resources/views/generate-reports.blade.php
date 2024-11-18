

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


                            @foreach($transactions as $transaction)
                                <x-tr>
                                    <x-th>{{$transaction->transaction_id}}</x-th>
                                    <x-th>
                                        <x-modal-toggle>Generate Report</x-modal-toggle>
                                        <x-modal>
                                            <x-modal-header>Report</x-modal-header>
                                            <x-modal-body>

                                                <x-table>
                                                    <x-table-head>
                                                        <x-tr>
                                                            <x-th>
                                                                Week
                                                            </x-th>
                                                            <x-th>
                                                                Products Sold
                                                            </x-th>
                                                            <x-th>
                                                                Gross Profit (£)
                                                            </x-th>
                                                        </x-tr>
                                                    </x-table-head>
                                                    <x-table-body>
                                                            <x-tr>
                                                                <x-th>1</x-th>
                                                                <x-th>
                                                                    7
                                                                </x-th>
                                                                <x-th>
                                                                    56.11
                                                                </x-th>
                                                            </x-tr>

                                                            <x-tr>
                                                                <x-th>2</x-th>
                                                                <x-th>
                                                                    7
                                                                </x-th>
                                                                <x-th>
                                                                    91.92
                                                                </x-th>
                                                            </x-tr>
                                                    </x-table-body>
                                                    <tfoot>
                                                        <tr class="font-semibold text-gray-900 dark:text-white">
                                                            <th scope="row" class="px-6 py-3 text-base">Total</th>
                                                            <td class="px-6 py-3">3</td>
                                                            <td class="px-6 py-3">21,000</td>
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
