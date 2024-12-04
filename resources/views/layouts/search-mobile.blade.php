
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
                        <x-tr class="max-sm:flex max-sm:flex-col !py-2">
                            <x-td>
                                <x-input-label for="min-price" :value="__('Min Price(£)')">Min Price(£)</x-input-label>
                                <x-text-input id="min-price" type="number" name="min-price" auto-complete="0" class="w-full basis-1/2"></x-text-input>
                            </x-td>
                            <x-td class="!py-2">
                                <x-input-label for="max-price" :value="__('Max Price(£)')">Max Price(£)</x-input-label>
                                <x-text-input id="max-price" type="number" name="max-price" auto-complete="100" class="w-full basis-1/2"></x-text-input>
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col !py-2">
                            <x-td>
                                <x-sidebar-selection-label>
                                    <x-sidebar-img src="{{asset('imgs/age.svg')}}"></x-sidebar-img>
                                    <x-sidebar-selection-info>Age</x-sidebar-selection-info>
                                </x-sidebar-selection-label>
                                <x-sidebar-dropdown-selection>
                                    <option selected>Choose age range</option>
                                    <option value="2">&lt; 2</option>
                                    <option value="4">&lt; 4</option>
                                    <option value="6">&lt; 6</option>
                                    <option value="100">10+</option>
                                </x-sidebar-dropdown-selection>
                            </x-td>
                            <x-td class="!py-2">
                                <x-sidebar-selection-label>
                                    <x-sidebar-img src="{{asset('imgs/time.svg')}}"></x-sidebar-img>
                                    <x-sidebar-selection-info>Time</x-sidebar-selection-info>
                                </x-sidebar-selection-label>
                                <x-sidebar-dropdown-selection>
                                    <option>Choose a Game Length</option>
                                    <option value="15">&lt; 15</option>
                                    <option value="30">&lt; 30</option>
                                    <option value="45">&lt; 45</option>
                                    <option value="100">60+</option>
                                </x-sidebar-dropdown-selection>
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col !py-2">
                            <x-td class="!py-2">
                                <x-sidebar-selection-label>
                                    <x-sidebar-img src="{{asset('imgs/player-count.svg')}}"></x-sidebar-img>
                                    <x-sidebar-selection-info>Player Count</x-sidebar-selection-info>
                                </x-sidebar-selection-label>
                                <x-sidebar-dropdown-selection>
                                    <option >Choose player count</option>
                                    <option value="4">&lt; 4</option>
                                    <option value="6">&lt; 6</option>
                                    <option value="8">&lt; 8</option>
                                    <option value="100">10 +</option>
                                </x-sidebar-dropdown-selection>
                            </x-td>
                            <x-td class="!py-2">
                                <x-sidebar-selection-label>
                                    <x-sidebar-img src="{{asset('imgs/game-type.svg')}}"></x-sidebar-img>
                                    <x-sidebar-selection-info>Game Type</x-sidebar-selection-info>
                                </x-sidebar-selection-label>
                                <x-sidebar-dropdown-selection>
                                    <option >Choose game type</option>
                                    <option value="board_game">Board Game</option>
                                    <option value="puzzle_game">Puzzles</option>
                                    <option value="figures">Figures</option>
                                    <option value="card_games">Card Games</option>
                                </x-sidebar-dropdown-selection>
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col !py-2">
                            <x-td class="!py-2">
                                <x-sidebar-selection-label>
                                    <x-sidebar-img src="{{asset('imgs/game-genre.svg')}}"></x-sidebar-img>
                                    <x-sidebar-selection-info>Game Genre</x-sidebar-selection-info>
                                </x-sidebar-selection-label>
                                <x-sidebar-dropdown-selection>
                                    <option >Choose game type</option>
                                    <option value="adventure">Adventure</option>
                                    <option value="competitive">Competitive</option>
                                    <option value="puzzle">Puzzle</option>
                                    <option value="Strategy">Strategy</option>
                                </x-sidebar-dropdown-selection>
                            </x-td>
                        </x-tr>
                    </x-table-body>
                </x-table>
            </x-accordion-body>
        </x-accordion-head>
    </div>
