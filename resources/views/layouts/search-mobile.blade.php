@if($searchRoute == 'dashboard.search')
    <div class="w-8/12 md:hidden md:w-1/2">
@else
    <div class="w-full">
@endif
        <form action="{{route($searchRoute)}}" method="GET" class="w-full flex flex-col justify-center items-center">
            @if($searchRoute == 'dashboard.search')
                <x-search-bar>Search</x-search-bar>
            @else
                <div class="flex justify-between items-center w-full max-md:flex-col">
                    <x-search-bar class="!w-1/3 max-md:!w-11/12">Search</x-search-bar>
                    <div class="flex flex-row max-md:pt-4 max-md:w-11/12 max-md:justify-between">
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
                        <x-modal-toggle data-modal-target="add-stock" data-modal-toggle="add-stock" class="float-right !w-24 flex justify-center items-center text-white ml-4"> Add</x-modal-toggle>
                    </div>
                </div>
            @endif
            <x-accordion-head class="!flex-col !items-end !justify-normal">
                <x-accordion-body>
                <ul class="max-sm:flex max-sm:justify-center max-sm:items-center">
                    <li class="py-2 mx-2 max-sm:w-52">
                        <x-sidebar-dropdown-button>
                            <x-sidebar-img src="{{asset('imgs/price.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Price</x-sidebar-dropdown-info>
                        </x-sidebar-dropdown-button>
                        <ul  class="py-2 space-y-2">
                            <x-sidebar-list>
                                <div class="w-2/5">
                                    <x-input-label for="min_price" :value="__('Min Price(£)')">Min Price(£)</x-input-label>
                                    <x-text-input id="min_price" type="number" name="min_price" auto-complete="0" value="0" class="w-full"></x-text-input>
                                </div>
                                <div class="w-2/5">
                                    <x-input-label for="max_price" :value="__('Max Price(£)')">Max Price(£)</x-input-label>
                                    <x-text-input id="max_price" type="number" name="max_price" auto-complete="100" value="1000" class="w-full"></x-text-input>
                                </div>
                            </x-sidebar-list>
                        </ul>
                    </li>
                </ul>
                <ul class="flex flex-row flex-wrap justify-evenly">
                    <li class="py-2 mx-2 max-md:w-52">
                        <x-sidebar-selection-label>
                            <x-sidebar-img src="{{asset('imgs/age.svg')}}"></x-sidebar-img>
                            <x-sidebar-selection-info>Age</x-sidebar-selection-info>
                        </x-sidebar-selection-label>
                        <x-sidebar-dropdown-selection name="age">
                            {{-- Value = 9999 allows sql to just select all <9999  which should be the same as not applying filter --}}
                            <option value="9999" selected>Choose age range</option>
                            <option value="2">&lt; 2</option>
                            <option value="4">&lt; 4</option>
                            <option value="6">&lt; 6</option>
                            <option value="100">10+</option>
                        </x-sidebar-dropdown-selection>
                    </li>
                    <li class="py-2 mx-2 max-md:w-52">
                        <x-sidebar-selection-label>
                            <x-sidebar-img src="{{asset('imgs/time.svg')}}"></x-sidebar-img>
                            <x-sidebar-selection-info>Time</x-sidebar-selection-info>
                        </x-sidebar-selection-label>
                        <x-sidebar-dropdown-selection name="game_length">
                            {{-- Value = 1=1 allows sql to just select all which would be the same as not applying filter --}}
                            <option value="9999" selected>Choose a Game Length</option>
                            <option value="15">&lt; 15</option>
                            <option value="30">&lt; 30</option>
                            <option value="45">&lt; 45</option>
                            <option value="100">60+</option>
                        </x-sidebar-dropdown-selection>
                    </li>
                    <li class="py-2 mx-2 max-md:w-52">
                        <x-sidebar-selection-label>
                            <x-sidebar-img src="{{asset('imgs/player-count.svg')}}"></x-sidebar-img>
                            <x-sidebar-selection-info>Player Count</x-sidebar-selection-info>
                        </x-sidebar-selection-label>
                        <x-sidebar-dropdown-selection name="player_count">
                            {{-- Value = 1=1 allows sql to just select all which would be the same as not applying filter --}}
                            <option value="9999" selected >Choose player count</option>
                            <option value="4">&lt; 4</option>
                            <option value="6">&lt; 6</option>
                            <option value="8">&lt; 8</option>
                            <option value="100">10 +</option>
                        </x-sidebar-dropdown-selection>
                    </li>
                    <li class="py-2 mx-2 max-md:w-52">
                        <x-sidebar-selection-label>
                            <x-sidebar-img src="{{asset('imgs/game-type.svg')}}"></x-sidebar-img>
                            <x-sidebar-selection-info>Game Type</x-sidebar-selection-info>
                        </x-sidebar-selection-label>
                        <x-sidebar-dropdown-selection name="game_type">
                            {{-- Value = 1=1 allows sql to just select all which would be the same as not applying filter --}}
                            <option value="" selected >Choose game type</option>
                            <option value="board_game">Board Game</option>
                            <option value="puzzle_game">Puzzles</option>
                            <option value="figures">Figures</option>
                            <option value="card_games">Card Games</option>
                        </x-sidebar-dropdown-selection>

                    </li>
                    <li class="py-2 mx-2 max-md:w-52">
                        <x-sidebar-selection-label>
                            <x-sidebar-img src="{{asset('imgs/game-genre.svg')}}"></x-sidebar-img>
                            <x-sidebar-selection-info>Game Genre</x-sidebar-selection-info>
                        </x-sidebar-selection-label>
                        <x-sidebar-dropdown-selection name="game_genre">
                            {{-- Value = 1=1 allows sql to just select all which would be the same as not applying filter --}}
                            <option value="" selected >Choose game type</option>
                            <option value="adventure">Adventure</option>
                            <option value="competitive">Competitive</option>
                            <option value="puzzle">Puzzle</option>
                            <option value="Strategy">Strategy</option>
                        </x-sidebar-dropdown-selection>
                </li>
                </ul>
                </x-accordion-body>
            </x-accordion-head>
        </form>
    </div>
