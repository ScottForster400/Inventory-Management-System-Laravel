<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">

            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Generate Reports') }}
                </h2>
            </div>

            <!-- Branch of Admin -->
            <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{$locationBranch}}
            </h2>
            </div>
        </div>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-3 gap-4 pb-4 pl-4">
                <div class="">
                    <!-- Date Filters -->
                    <form method="GET" action="{{ route('admin.index') }}">
                        <label for="dateFilter">Sort By:</label>
                        <select name="dateFilter" id="dateFilter" onchange="this.form.submit()">
                            <option value="today" {{ $dateFilter == 'today' ? 'selected' : '' }}>Today</option>
                            <option value="thisWeek" {{ $dateFilter == 'thisWeek' ? 'selected' : '' }}>This Week</option>
                            <option value="thisMonth" {{ $dateFilter == 'thisMonth' ? 'selected' : '' }}>This Month</option>
                            <option value="thisYear" {{ $dateFilter == 'thisYear' ? 'selected' : '' }}>This Year</option>
                            <option value="all" {{ $dateFilter == 'all' ? 'selected' : '' }}>All Time</option>
                        </select>
                    </form>

                </div>
            </div>



            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    {{-- i have used this youtube video to help me make this line graph https://www.youtube.com/watch?v=c19gFmvxW80 --}}
                    <div>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">

                        var transactionData = {{Js::from($chartData)}}


                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                            var data = google.visualization.arrayToDataTable(transactionData);

                            var options = {
                            title: 'Branch Performance',
                            curveType: 'function',
                            legend: { position: 'bottom' }
                            };

                            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                            google.visualization.events.addListener(chart, 'error', function (googleError) {
                                google.visualization.errors.removeError(googleError.id);
                                document.getElementById("errorMessage").innerHTML ="There are no Transactions within this Timeframe";
                            });

                            chart.draw(data, options);
                        }
                        </script>
                    </div>

                    <div class="w-full">
                        <!-- If no transactions within timeframe, error message displays -->
                        <p id="errorMessage" class="text-center font-semibold"></p>
                        <!-- Graph for transactions -->
                        <div id="curve_chart" style="height: 350px; width:750px;" class="mx-auto max-md:hidden"></div>
                    </div>



                </div>
            </div>

            <br>

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
                                        <x-modal-toggle data-modal-target="edit{{$date}}" data-modal-toggle="edit{{$date}}">View Daily Report</x-modal-toggle>
                                        <!-- Modal to view report -->
                                        <x-modal id="edit{{$date}}" class="bg-gray-500 bg-opacity-75 h-full">
                                            <x-modal-header data-modal-hide="edit{{$date}}">Report</x-modal-header>
                                            <x-modal-body>

                                                <x-table>
                                                    <x-table-head>
                                                        <x-tr class="max-md:hidden">
                                                            <x-th>
                                                                Stock ID
                                                            </x-th>
                                                            <x-th>
                                                                Amount
                                                            </x-th>
                                                            <x-th>
                                                                Price(£)
                                                            </x-th>
                                                            <x-th>
                                                                Time
                                                            </x-th>
                                                        </x-tr>
                                                        <tr class="sm:hidden">
                                                            <x-th>ID</x-th>
                                                            <x-th>Amt</x-th>
                                                            <x-th>£</x-th>
                                                        </tr>
                                                    </x-table-head>
                                                    @foreach ($transactions as $transaction)
                                                        <x-table-body>
                                                                <x-tr class="max-md:hidden">
                                                                    <x-th>
                                                                        {{$transaction->transaction_id}}
                                                                    </x-th>
                                                                    <x-th>
                                                                        {{$transaction->amount}}
                                                                    </x-th>
                                                                    <x-th>
                                                                        {{$transaction->price}}
                                                                    </x-th>
                                                                    <x-th>
                                                                        {{$transaction->created_at->format('H:i')}}
                                                                    </x-th>
                                                                </x-tr>

                                                                <x-tr class="sm:hidden">
                                                                    <x-th>
                                                                        {{$transaction->transaction_id}}
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
