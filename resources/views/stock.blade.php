@php

    $currentRoute = Route::currentRouteName();
    $sortRoute = 'stocks.sort';
    $editRoute = 'stocks.update';
    $addRoute = 'stocks.store';
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
            <x-search-bar class="!w-1/3 !max-w-80">Search</x-search-bar>
            <x-modal-toggle data-modal-target="add-stock" data-modal-toggle="add-stock" class="float-right !w-24 flex justify-center items-center text-white "> Add</x-modal-toggle>

        </div>
        @include('layouts.add-stock-modal')
        <div class="flex w-11/12 justify-center items-center flex-col bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg m-5 mb-10">
            <div class="flex justify-center items-center w-11/12 m-5">
                <x-table class="w-4/5 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <x-table-head>
                        <x-tr>
                            <x-th >
                                Item Code
                            </x-th>
                            <x-th >
                                <p>Description</p>
                            </x-th>
                            <x-th>
                                <p >Quantity</p>
                            </x-th>
                            <x-th>
                                <p >Unit Price</p>
                            </x-th>
                            <x-th>
                                Action
                            </x-th>
                        </x-tr>
                    </x-table-head>
                    <x-table-body>

                            @php
                                $int=0
                            @endphp

                        @foreach($products as $product)


                            <x-tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <x-th>
                                    {{ $product->product_id }}
                                </x-th>
                                <x-td>
                                    {{$product->name }}
                                </x-td>
                                <x-td>
                                    {{$stock[$int]->amount}}
                                </x-td>
                                <x-td>
                                    £{{$product->Price}}
                                </x-td>
                                <x-td class="flex flex-row">
                                    @include('layouts.edit-stock-modal')
                                    <form method="POST" action="{{ route('stocks.destroy', $product->product_id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class=" !py-3 ml-3 !h-12 hover:!bg-red-800 !transition-colors max-sm:!w-full max-sm:m-2 max-sm:!h-14 flex justify-center items-center !rounded-3xl" onclick="return confirm('Are you sure you would like to delete this product')" >Delete Stock</x-danger-button>
                                    </form>
                                </x-td>
                            </x-tr>
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
    </div>


</x-app-layout>
