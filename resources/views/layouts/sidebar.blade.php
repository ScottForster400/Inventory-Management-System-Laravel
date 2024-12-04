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
                                    <x-input-label for="min-price" :value="__('Min Price(£)')">Min Price(£)</x-input-label>
                                    <x-text-input id="min-price" type="number" name="min-price" auto-complete="0" class="w-full"></x-text-input>
                                </div>
                                <div class="w-2/5">
                                    <x-input-label for="max-price" :value="__('Max Price(£)')">Max Price(£)</x-input-label>
                                    <x-text-input id="max-price" type="number" name="max-price" auto-complete="100" class="w-full"></x-text-input>
                                </div>
                            </x-sidebar-list>
                        </ul>
                    </li>
                    <li>
                        <x-sidebar-dropdown-selection data-dropdown-toggle="age-dropdown">
                            <x-sidebar-img src="{{asset('imgs/age.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Age</x-sidebar-dropdown-info>
                        </x-sidebar-dropdown-selection>
                        <x-dropdown-button-body id="age-dropdown">
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="0-2"></x-dropdown-button-input>
                                <x-dropdown-button-label for="0-2">0-2</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="2-4"></x-dropdown-button-input>
                                <x-dropdown-button-label for="2-4">2-4</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="4-6"></x-dropdown-button-input>
                                <x-dropdown-button-label for="4-6">4-6</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="6-10"></x-dropdown-button-input>
                                <x-dropdown-button-label for="6-10">6-10</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="10"></x-dropdown-button-input>
                                <x-dropdown-button-label for="10">10+</x-dropdown-button-label>
                            </x-dropdown-button-li>
                        </x-dropdown-button-body>
                    </li>
                    <li>
                        <x-sidebar-dropdown-selection data-dropdown-toggle="time-dropdown">
                            <x-sidebar-img src="{{asset('imgs/time.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Time</x-sidebar-dropdown-info>
                        </x-sidebar-dropdown-selection>
                        <x-dropdown-button-body id="time-dropdown">
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="0-15"></x-dropdown-button-input>
                                <x-dropdown-button-label for="0-15">&lt; 15</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="15-30"></x-dropdown-button-input>
                                <x-dropdown-button-label for="15-30">&lt; 30</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="30-45"></x-dropdown-button-input>
                                <x-dropdown-button-label for="30-45">&lt; 45</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="45-60"></x-dropdown-button-input>
                                <x-dropdown-button-label for="45-60">60 +</x-dropdown-button-label>
                            </x-dropdown-button-li>
                        </x-dropdown-button-body>
                    </li>
                    <li>
                        <x-sidebar-dropdown-selection data-dropdown-toggle="player-count-dropdown">
                            <x-sidebar-img src="{{asset('imgs/player-count.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Player Count</x-sidebar-dropdown-info>
                        </x-sidebar-dropdown-selection>
                        <x-dropdown-button-body id="player-count-dropdown">
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="0-4"></x-dropdown-button-input>
                                <x-dropdown-button-label for="0-4">&lt; 4</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="<6"></x-dropdown-button-input>
                                <x-dropdown-button-label for="<6">&lt; 6</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="6-8"></x-dropdown-button-input>
                                <x-dropdown-button-label for="6-8">&lt; 8</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="8-10"></x-dropdown-button-input>
                                <x-dropdown-button-label for="8-10">10 +</x-dropdown-button-label>
                            </x-dropdown-button-li>
                        </x-dropdown-button-body>
                    </li>
                    <li>
                        <x-sidebar-dropdown-selection data-collapse-toggle="game-type-dropdown">
                            <x-sidebar-img src="{{asset('imgs/game-type.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Game Type</x-sidebar-dropdown-info>
                        </x-sidebar-dropdown-selection>
                        <x-dropdown-button-body id="game-type-dropdown">
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="boardgame"></x-dropdown-button-input>
                                <x-dropdown-button-label for="boardgame">Board Game</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="puzzlegame"></x-dropdown-button-input>
                                <x-dropdown-button-label for="puzzlegame">Puzzles</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="figures"></x-dropdown-button-input>
                                <x-dropdown-button-label for="figures">Figures</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="card-game"></x-dropdown-button-input>
                                <x-dropdown-button-label for="card-game">Card Games</x-dropdown-button-label>
                            </x-dropdown-button-li>
                        </x-dropdown-button-body>
                    </li>
                    <li>
                        <x-sidebar-dropdown-selection data-collapse-toggle="game-genre-dropdown">
                            <x-sidebar-img src="{{asset('imgs/game-genre.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Game Genre</x-sidebar-dropdown-info>
                        </x-sidebar-dropdown-selection>
                        <x-dropdown-button-body id="game-genre-dropdown">
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="adventure"></x-dropdown-button-input>
                                <x-dropdown-button-label for="adventure">Adventure</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="puzzle"></x-dropdown-button-input>
                                <x-dropdown-button-label for="puzzle">Puzzle</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="competitive"></x-dropdown-button-input>
                                <x-dropdown-button-label for="competitive">Competitive</x-dropdown-button-label>
                            </x-dropdown-button-li>
                            <x-dropdown-button-li>
                                <x-dropdown-button-input id="strategy"></x-dropdown-button-input>
                                <x-dropdown-button-label for="strategy">Strategy</x-dropdown-button-label>
                            </x-dropdown-button-li>
                        </x-dropdown-button-body>
                </li>
                    <li>

                    </li>
                </ul>
            </form>
       </div>
    </aside>
</div>
