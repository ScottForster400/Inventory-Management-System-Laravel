<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-row w-full">
        @include('layouts.sidebar')
        <div class=" w-full py-12  flex items-center flex-col ">
            <div class="w-8/12 md:hidden md:w-1/2">
                <x-search-bar>Search</x-search-bar>
                <x-accordion-head class="!flex-col !items-end !justify-normal">
                    <x-accordion-body>
                        <x-table>
                            <x-table-head>
                                <x-th>
                                    Filters
                                </x-th>
                            </x-table-head>
                            <x-table-body>
                                <x-tr class="!py-2">
                                    <x-td>
                                        <x-input-label for="min-price" :value="__('Min Price(£)')">Min Price(£)</x-input-label>
                                        <x-text-input id="min-price" type="number" name="min-price" auto-complete="0" class="w-full basis-1/2"></x-text-input>
                                    </x-td>
                                    <x-td class="!py-2">
                                        <x-input-label for="max-price" :value="__('Max Price(£)')">Max Price(£)</x-input-label>
                                        <x-text-input id="max-price" type="number" name="max-price" auto-complete="100" class="w-full basis-1/2"></x-text-input>
                                    </x-td>
                                </x-tr>
                                <x-tr class="!py-2">
                                    <x-td>
                                        <x-dropdown-button class="w-full flex justify-between" data-dropdown-toggle="age-mob">Age</x-dropdown-button>
                                        <x-dropdown-button-body id="age-mob">
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="0-2-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="0-2-mb">0-2</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="2-4-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="2-4-mb">2-4</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="4-6-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="4-6-mb">4-6</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="6-10-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="6-10-mb">6-10</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="10-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="10-mb">10+</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                        </x-dropdown-button-body>
                                    </x-td>
                                    <x-td class="!py-2">
                                        <x-dropdown-button class="w-full flex justify-between" data-dropdown-toggle="time-mb">Time</x-dropdown-button>
                                        <x-dropdown-button-body id="time-mb">
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="0-15-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="0-15-mb">&lt; 15</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="15-30-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="15-30-mb">&lt; 30</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="30-45-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="30-45-mb">&lt; 45</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="45-60-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="45-60-mb">60 +</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                        </x-dropdown-button-body>
                                    </x-td>
                                </x-tr>
                                <x-tr class="!py-2">
                                    <x-td class="!py-2">
                                        <x-dropdown-button class="w-full flex justify-between" data-dropdown-toggle="player-count-mb">Players</x-dropdown-button>
                                        <x-dropdown-button-body id="player-count-mb">
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="0-4-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="0-4-mb">&lt; 4</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="<6-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="<6-mb">&lt; 6</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="6-8-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="6-8-mb">&lt; 8</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                            <x-dropdown-button-li>
                                                <x-dropdown-button-input id="8-10-mb"></x-dropdown-button-input>
                                                <x-dropdown-button-label for="8-10-mb">10 +</x-dropdown-button-label>
                                            </x-dropdown-button-li>
                                        </x-dropdown-button-body>
                                    </x-td>
                                    <x-td class="!py-2">
                                        <x-input-label for="max-price" :value="__('Max Price(£)')">Max Price(£)</x-input-label>
                                        <x-text-input id="max-price" type="number" name="max-price" auto-complete="100" class="w-full basis-1/2"></x-text-input>
                                    </x-td>
                                </x-tr>
                            </x-table-body>
                        </x-table>
                    </x-accordion-body>
                </x-accordion-head>
            </div>
            <div class="flex flex-3/4 md:pl-20 md:pr-20 max-w-8/10 w-full">
                <div class=" overflow-hidden w-full">
                    <div class=" flex max-md:flex-col max-md:justify-center max-md:items-center md:flex-row md:flex-wrap md:justify-evenly p-6 text-gray-900 dark:text-gray-100 ">
                        @forelse ($products as $product)
                            <x-card-main class="flex flex-col mb-5 mx-5 hover:shadow-2xl transition-shadow text-center">
                                <x-card-img src="{{asset($product->image)}}"></x-card-img>
                                <x-card-body>
                                    <x-card-title>{{$product->name}}</x-card-title>
                                    <x-card-para>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat recusandae aliquid quis animi unde at reprehenderit voluptatibus iste laborum in, voluptas possimus quam quos minima corporis nam error aperiam laboriosam.</x-card-para>
                                    <x-card-links>SAmple links</x-card-links>
                                </x-card-body>
                            </x-card-main>
                        @empty
                            <p>No Stock in the system</p>
                        @endforelse
                    </div>
                    <div class="w-full pt-3">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
