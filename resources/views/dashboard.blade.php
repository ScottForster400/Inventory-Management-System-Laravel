@php
    //defines variables that are used in certain ui components
    $currentRoute = Route::currentRouteName();
    $sortRoute = 'dashboard.sort';
    $editRoute = 'dashboard.update';
    $addRoute = 'dashboard.store';
    $searchRoute ='dashboard.search';
    $search=$_REQUEST;
    $isSortRoute = 'false';
    if($currentRoute == 'dashboard.search' || $currentRoute == 'dashboard.sortSearch'){
        $sortRoute = 'dashboard.sortSearch';
    };
    if ($currentRoute == 'dashboard.sortSearch') {
        $search = $_REQUEST['search'];
    }
    if($currentRoute == 'dashboard.sort' || $currentRoute == 'dashboard.sortSearch'){

        $isSortRoute = 'true';
    }
@endphp

<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-row w-full">

        {{-- Sidebar (search + filters) for desktop --}}
        @include('layouts.sidebar')
        <div class=" w-full py-12  flex items-center flex-col ">

            {{-- Search + filters for Mobile --}}
            @include('layouts.search-mobile')

            {{-- Sort by drop down --}}
            <div class="max-md:w-8/12 w-4/5 flex items-center justify-between py-2">
                <x-dropdown-button class="float-left !w-24 ">Sort</x-dropdown-button>
                    <div>
                        <x-dropdown-button-body>
                            <x-dropdown-button-li class="w-full">
                                <x-dropdown-button-a href="{{route($sortRoute, ['sort_by'=>'alph_asc', 'search'=>$search] )}}">A to Z</x-dropdown-button-a>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li class="w-full">
                                <x-dropdown-button-a href="{{route($sortRoute, ['sort_by'=>'alph_des', 'search'=>$search])}}">Z to A</x-dropdown-button-a>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li class="w-full">
                                <x-dropdown-button-a href="{{route($sortRoute, ['sort_by'=>'price_asc', 'search'=>$search])}}">Low to High</x-dropdown-button-a>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li class="w-full">
                                <x-dropdown-button-a href="{{route($sortRoute, ['sort_by'=>'price_des', 'search'=>$search])}}">High to Low</x-dropdown-button-a>
                            </x-dropdown-button-li>
                        </x-dropdown-button-body>
                    </div>

                    {{-- Add Stock modal toggle --}}
                    <x-modal-toggle data-modal-target="add-stock" data-modal-toggle="add-stock" class="float-right !w-24 flex justify-center items-center text-white ">Add</x-modal-toggle>
            </div>

            {{-- Add stock modal layout --}}
            @include('layouts.add-stock-modal')

            {{-- Displays success message if session contains data --}}
            @if (session('success'))
                <x-success>{{Session::pull('success')}}</x-success>
            @endif

            {{-- Main display for all products --}}
            <div class="flex flex-3/4 md:pl-20 md:pr-20 max-w-8/10 w-full">
                <div class=" overflow-hidden w-full">
                    <div class=" flex max-md:flex-col max-md:justify-center max-md:items-center md:flex-row flex-wrap md:justify-evenly p-6 text-gray-900 dark:text-gray-100 ">

                            @php
                                //int is used as it allows me to fetch data from stocks whilst being a for each loop for products array
                                $int=0
                            @endphp

                        {{-- Creates a card for each product fetched from database --}}
                        @forelse ($products as $product)
                            @php
                                $game_type = $product->game_type;
                            @endphp
                            <x-card-main  class="flex flex-col mb-5 md:mx-5 hover:shadow-2xl transition-shadow text-center w-1/3 md:max-w-72 md:min-w-64 max-sm:w-full max-sm:max-w-80 items-center">
                                <div style="flex: 50%" class=" flex justify-center items-center max-h-4/5 overflow-hidden rounded-lg w-4/5 h-4/5 pt-5">
                                    <x-card-img class="object-fill aspect-square" src="{{asset($product->image)}}"></x-card-img>
                                </div>

                                {{-- Contains product details --}}
                                <x-card-body class="!py-5 !px-0 w-full">
                                    <x-card-title>{{ Str::limit($product->name,20, '...')}}</x-card-title>
                                    <p class="text-centre text-gray-500 ">£{{$product->Price}}</p>
                                    <div class="flex flex-row text-center items-center ">
                                        @if ($game_type == 'puzzle_game')
                                            <p class="text-centre text-gray-500 basis-1/3">Puzzle Game</p>
                                        @elseif($game_type =='board_game')
                                            <p class="text-centre text-gray-500 basis-1/3">Board Game</p>
                                        @elseif($game_type=='card_game')
                                            <p class="text-centre text-gray-500 basis-1/3">Card Game</p>
                                        @elseif($game_type=='figures')
                                            <p class="text-centre text-gray-500 basis-1/3">Figure</p>
                                        @else
                                            <p class="text-centre text-gray-500 basis-1/3">No Type</p>
                                        @endif

                                        <p class="text-centre text-gray-500 basis-1/3">{{$product->game_genre}}</p>
                                        <p class="text-centre text-gray-500 basis-1/3">{{$product->game_length}} mins</p>
                                    </div>
                                    <p class="text-centre text-gray-500 ">{{$product->minimum_player_count}}-{{$product->maximum_player_count}} players</p>
                                    <x-card-para class="whitespace-pre-wrap min-h-14 ">{{ Str::limit($product->description,25, '...')}}</x-card-para>

                                    {{-- Contains edit and add to cart which allow interaction with products --}}
                                    <x-card-links>
                                        <div class="w-1/3">
                                            @include('layouts.edit-stock-modal')
                                        </div>
                                        <x-primary-button class="w-1/3 h-12 flex justify-center items-center !rounded-full !bg-blue-700 hover:!bg-blue-800 !transition-colors">
                                            <a href="javascript:void(0);" onclick="document.getElementById('checkout-form-{{ $product->product_id }}').submit();" class="flex justify-center items-center">
                                                <img src="{{asset('imgs/cart.png')}}" alt="Cart" class="h-2/3 w-2/3 max-w-full">
                                            </a>
                                        </x-primary-button>
                                    </x-card-links>
                                </x-card-body>
                            </x-card-main>

                            {{-- Modal for add image  --}}
                            @include('layouts.add-image-modal')
                            @php

                            $int++;
                            @endphp
                            <form id="checkout-form-{{ $product->product_id }}" action="{{ route('checkout.add')}}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="productIdToAddToCart" value="{{$product->product_id}}">
                            </form>

                        {{-- Displayed if $products is empty --}}
                        @empty
                            <p>No Stock in the system</p>
                        @endforelse
                    </div>

                    {{-- pagination navigation --}}
                    <div class="w-full pt-3 max-md:px-4">
                        {{$products->appends($_GET)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
