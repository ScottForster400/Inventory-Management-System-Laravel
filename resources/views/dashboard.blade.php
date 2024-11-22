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
            <x-modal id="add-stock" class="bg-gray-500 bg-opacity-75 h-full">
                <x-modal-header data-modal-hide="add-stock">
                    Add Stock
                </x-modal-header>
                <x-modal-body>
                    <form action="">
                        <x-table>
                            <x-table-body>
                                <x-tr class="max-sm:flex max-sm:flex-col">
                                    <x-td class="max-sm:w-full">
                                        <x-input-label for="min-price" :value="__('Product Name')" >Product Name</x-input-label>
                                        <x-text-input id="min-price" type="text" name="name" class="w-full basis-1/2"></x-text-input>
                                    </x-td>
                                    <x-td >
                                        <x-input-label for="price" :value="__('Price(£)')">Price(£)</x-input-label>
                                        <x-text-input id="price" type="number" name="price"  class="w-full basis-1/2"></x-text-input>
                                    </x-td>
                                    <x-td>
                                        <x-input-label for="manufacturer" :value="__('Manufacturer')" >Manufacturer</x-input-label>
                                        <x-text-input id="manufacturer" type="text" name="Manufacturer" class="w-full basis-1/2"></x-text-input>
                                    </x-td>
                                </x-tr>
                                <x-tr class="max-sm:flex max-sm:flex-col">
                                    <x-td>
                                        <x-input-label for="age-rating" :value="__('Age Rating')" >Age Rating</x-input-label>
                                        <x-text-input id="age-rating" type="number" name="age-rating" min=0  class="w-full basis-1/2"></x-text-input>
                                    </x-td>
                                    <x-td>
                                        <x-input-label for="player-count" :value="__('Player Count')">Player Count</x-input-label>
                                        <x-text-input id="player-count" type="number" name="player-count" min=0 class="w-full basis-1/2"></x-text-input>
                                    </x-td>
                                    <x-td>
                                        <x-input-label for="game-length" :value="__('Game Length')" >Game Length</x-input-label>
                                        <x-text-input id="game-length" type="number" name="game-length" min=0 class="w-full basis-1/2"></x-text-input>
                                    </x-td>
                                </x-tr>
                                <x-tr class="max-sm:flex max-sm:flex-col">
                                    <x-td>
                                        <x-input-label for="game-type" :value="__('Game Type')" >Game Type</x-input-label>
                                        <x-select id="game-type"  class="w-full basis-1/2">
                                            <option value="board-game">Board Game</option>
                                            <option value="puzzle-game">Puzzles</option>
                                            <option value="figures">Figures</option>
                                            <option value="card-game">Card Game</option>
                                        </x-select>
                                    </x-td>
                                    <x-td class="!py-2">
                                        <x-input-label for="game-genre" :value="__('Game Genre')" >Game Genre</x-input-label>
                                        <x-select id="game-genre"  class="w-full basis-1/2">
                                            <option value="adventure">Adventure</option>
                                            <option value="puzzle">Puzzle</option>
                                            <option value="competitive">Competitive</option>
                                            <option value="strategy">Strategy</option>
                                        </x-select>
                                    </x-td>
                                </x-tr>
                            </x-table-body>
                        </x-table>
                        <div class="w-full">
                            <x-input-label for="description" :value="__('Description')" >Description</x-input-label>
                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description..."></textarea>
                        </div>
                    </x-modal-body>
                    <x-modal-footer>
                        Add Stock
                    </x-modal-footer>
                </form>
            </x-modal>
            <div class="flex flex-3/4 md:pl-20 md:pr-20 max-w-8/10 w-full">
                <div class=" overflow-hidden w-full">
                    <div class=" flex max-md:flex-col max-md:justify-center max-md:items-center md:flex-row md:flex-wrap md:justify-evenly p-6 text-gray-900 dark:text-gray-100 ">
                        @forelse ($products as $product)
                            <x-card-main class="flex flex-col mb-5 mx-5 hover:shadow-2xl transition-shadow text-center">
                                <x-card-img src="{{asset($product->image)}}"></x-card-img>
                                <x-card-body>
                                    <x-card-title>{{$product->name}}</x-card-title>
                                    <x-card-para>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat recusandae aliquid quis animi unde at reprehenderit voluptatibus iste laborum in, voluptas possimus quam quos minima corporis nam error aperiam laboriosam.</x-card-para>
                                    <x-card-links>
                                        <x-primary-button class="w-1/3 h-12 flex justify-center items-center !rounded-full !bg-blue-700 hover:!bg-blue-800 !transition-colors">Edit</x-primary-button>
                                        <x-primary-button class="w-1/3 h-12 flex justify-center items-center !rounded-full !bg-blue-700 hover:!bg-blue-800 !transition-colors"><img src="{{asset('imgs/cart.png')}}" alt="Cart" class="w-1/2"></img></x-primary-button>
                                    </x-card-links>
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
