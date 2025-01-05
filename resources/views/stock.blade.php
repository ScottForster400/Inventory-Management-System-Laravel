@php
    $currentRoute = Route::currentRouteName();
    $sortRoute = 'stocks.sort';
    $editRoute = 'stocks.update';
    $addRoute = 'stocks.store';
    $searchRoute ='stocks.search';
    $search=$_REQUEST;
    $isSortRoute = 'false';
    if($currentRoute == 'stocks.search' || $currentRoute == 'stocks.sortSearch'){
        $sortRoute = 'stocks.sortSearch';
    };
    if ($currentRoute == 'stocks.sortSearch') {
        $search = $_REQUEST['search'];
    }
    if($currentRoute == 'stocks.sort' || $currentRoute == 'stocks.sortSearch'){

        $isSortRoute = 'true';
    }
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stock Management') }}
        </h2>
    </x-slot>
    <div class="flex w-full justify-center items-center flex-col">
            @if (session('success'))
                <x-success>{{Session::pull('success')}}</x-success>
            @endif

        <div class=" w-11/12 mt-3 flex justify-between items-center">
            @include('layouts.search-mobile')
        </div>
        @include('layouts.add-stock-modal')
        <div class="flex w-11/12 justify-center items-center flex-col bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg m-5 mb-10">
            <h1 class="py-3">Stock</h1>
            <div class="flex justify-center items-center w-11/12 m-5">
                <x-table class="w-4/5 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <x-table-head>
                        <x-tr>
                            <x-th >
                                Id
                            </x-th>
                            <x-th >
                                <p>Name</p>
                            </x-th>
                            <x-th class="max-sm:hidden">
                                <p >Quant</p>
                            </x-th>
                            <x-th class="max-sm:hidden">
                                <p >Unit Price</p>
                            </x-th>
                            <x-th class="">
                                Action
                            </x-th>
                        </x-tr>
                    </x-table-head>
                    <x-table-body>

                            @php
                                $int=0
                            @endphp

                        @foreach($products as $product)
                            @if ($stock[$int]->amount<=10)
                                <x-tr class="bg-red-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-red-300 dark:hover:bg-gray-600 transition-colors">
                                    @include('layouts.stock-table-item')
                                </x-tr>
                            @elseif($stock[$int]->amount<=30)
                            <x-tr class="bg-amber-100 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-amber-200 dark:hover:bg-gray-600 transition-colors">
                                @include('layouts.stock-table-item')
                            </x-tr>
                            @else
                            <x-tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                                @include('layouts.stock-table-item')
                            </x-tr>
                            @endif
                            @php

                            $int++;
                            @endphp

                        @endforeach
                    </x-table-body>
                </x-table>
            </div>
            <div class=" w-4/5 my-4">
                {{ $products->links() }}
            </div>
        </div>

        <div class="flex w-11/12 justify-center items-center flex-col bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg m-5 mb-10">
            <h1 class="py-3">Low Stock</h1>
            <div class="flex justify-center items-center w-11/12 m-5">
                <x-table class="w-4/5 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <x-table-head>
                        <x-tr>
                            <x-th >
                                Id
                            </x-th>
                            <x-th >
                                <p>Name</p>
                            </x-th>
                            <x-th>
                                <p >Quant</p>
                            </x-th>
                            <x-th class="max-sm:hidden">
                                <p >Unit Price</p>
                            </x-th>
                            <x-th class="max-sm:hidden">
                                Action
                            </x-th>
                        </x-tr>
                    </x-table-head>
                    <x-table-body>

                            @php
                                $int=0
                            @endphp

                        @foreach($lowStockProducts as $product)
                            @if ($lowStock[$int]->amount<=10)
                                <x-tr class="bg-red-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-red-300 dark:hover:bg-gray-600 transition-colors">
                                    @include('layouts.low-stock-table-item')
                                </x-tr>
                            @elseif($lowStock[$int]->amount<=30)
                            <x-tr class="bg-amber-100 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-amber-200 dark:hover:bg-gray-600 transition-colors">
                                @include('layouts.low-stock-table-item')
                            </x-tr>
                            @else
                            <x-tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                                @include('layouts.low-stock-table-item')
                            </x-tr>
                            @endif
                            @php

                            $int++;
                            @endphp

                        @endforeach
                    </x-table-body>
                </x-table>
            </div>
            <div class=" w-4/5 my-4">
            </div>
        </div>
    </div>


</x-app-layout>
