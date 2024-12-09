<div class="max-md:hidden sticky">
    <aside id="default-sidebar" class=" sticky top-0 left-0 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
       <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800 ">
            <form action="{{route('dashboard.search')}}" method="GET">
                <ul class="space-y-2 font-medium w-full max-w-full">
                        <x-sidebar-list class="pb-3" >
                            <x-search-bar class="w-11/12">Search</x-search-bar>
                        </x-sidebar-list>
                    <li>
                        <x-sidebar-dropdown-button data-collapse-toggle="price">
                            <x-sidebar-img src="{{asset('imgs/price.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Price</x-sidebar-dropdown-info>
                        </x-sidebar-dropdown-button>
                        <ul id="price" class="hidden py-2 space-y-2">
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
                    <li>
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
                    <li>
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
                    <li>
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
                    <li>
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
                    <li>
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
            </form>
       </div>
    </aside>
</div>
