{{-- {{dd($_REQUEST)}} --}}
<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-row w-full">
        @include('layouts.sidebar')
        <div class=" w-full py-12  flex items-center flex-col ">
            @include('layouts.search-mobile')
            <div class="max-md:w-8/12 w-4/5 flex items-center justify-between py-2">
                <x-dropdown-button class="float-left !w-24 ">Sort</x-dropdown-button>
                    <div>
                        <x-dropdown-button-body>
                            <x-dropdown-button-li class="w-full">
                                <x-dropdown-button-a>A to Z</x-dropdown-button-a>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li class="w-full">
                                <x-dropdown-button-a>Z to A</x-dropdown-button-a>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li class="w-full">
                                <x-dropdown-button-a>Low to High</x-dropdown-button-a>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li class="w-full">
                                <x-dropdown-button-a>High to Low</x-dropdown-button-a>
                            </x-dropdown-button-li>
                        </x-dropdown-button-body>
                    </div>
                    <x-modal-toggle data-modal-target="add-stock" data-modal-toggle="add-stock" class="float-right !w-24 flex justify-center items-center text-white "> Add</x-modal-toggle>
            </div>
            @include('layouts.add-stock-modal')
            <div class="flex flex-3/4 md:pl-20 md:pr-20 max-w-8/10 w-full">
                <div class=" overflow-hidden w-full">
                    <div class=" flex max-md:flex-col max-md:justify-center max-md:items-center md:flex-row md:flex-wrap md:justify-evenly p-6 text-gray-900 dark:text-gray-100 ">
                        @if (array_key_exists('page' , $_REQUEST))
                            @php
                                $pagemult=$_REQUEST['page'];
                                $pagemult--;
                                $int=4*$pagemult;

                            @endphp
                        @else
                            @php
                                $int=0
                            @endphp
                        @endif
                        @forelse ($products as $product)
                            @php
                                $game_type = $product->game_type;
                            @endphp
                            <x-card-main class="flex flex-col mb-5 mx-5 hover:shadow-2xl transition-shadow text-center max-sm:w-full">
                                <div class="basis-1/2 flex justify-center items-center">
                                    <x-card-img src="{{asset($product->image)}}"></x-card-img>
                                </div>
                                <x-card-body>
                                    <x-card-title>{{$product->name}}</x-card-title>
                                    <p class="text-centre text-gray-500 ">£{{$product->Price}}</p>
                                    <div class="flex flex-row text-center items-center  ">
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
                                    <x-card-links>
                                        @include('layouts.edit-stock-modal')
                                        <x-primary-button class="w-1/3 h-12 flex justify-center items-center !rounded-full !bg-blue-700 hover:!bg-blue-800 !transition-colors"><img src="{{asset('imgs/cart.png')}}" alt="Cart" class="w-1/2"></img></x-primary-button>
                                    </x-card-links>
                                </x-card-body>
                            </x-card-main>
                            @php

                            $int++;
                            @endphp
                        @empty
                            <p>No Stock in the system</p>
                        @endforelse
                    </div>
                    <div class="w-full pt-3 max-md:px-4">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
