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
                        <x-tr class="max-sm:flex max-sm:flex-col !py-2">
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
                                <x-dropdown-button class="w-full flex justify-between" data-dropdown-toggle="game-type-mb">Type</x-dropdown-button>
                                <x-dropdown-button-body id="game-type-mb">
                                    <x-dropdown-button-li>
                                        <x-dropdown-button-input id="boardgame-mb"></x-dropdown-button-input>
                                        <x-dropdown-button-label for="boardgame-mb">Board Game</x-dropdown-button-label>
                                    </x-dropdown-button-li>
                                    <x-dropdown-button-li>
                                        <x-dropdown-button-input id="puzzlegame-mb"></x-dropdown-button-input>
                                        <x-dropdown-button-label for="puzzlegame-mb">Puzzles</x-dropdown-button-label>
                                    </x-dropdown-button-li>
                                    <x-dropdown-button-li>
                                        <x-dropdown-button-input id="figures-mb"></x-dropdown-button-input>
                                        <x-dropdown-button-label for="figures-mb">Figures</x-dropdown-button-label>
                                    </x-dropdown-button-li>
                                    <x-dropdown-button-li>
                                        <x-dropdown-button-input id="card-game-mb"></x-dropdown-button-input>
                                        <x-dropdown-button-label for="card-game-mb">Card Games</x-dropdown-button-label>
                                    </x-dropdown-button-li>
                                </x-dropdown-button-body>
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col !py-2">
                            <x-td class="!py-2">
                                <x-dropdown-button class="w-full flex justify-between" data-dropdown-toggle="game-genre-mb">Genre</x-dropdown-button>
                                <x-dropdown-button-body id="game-genre-mb">
                                    <x-dropdown-button-li>
                                        <x-dropdown-button-input id="adventure-mb"></x-dropdown-button-input>
                                        <x-dropdown-button-label for="adventure-mb">Adventure</x-dropdown-button-label>
                                    </x-dropdown-button-li>
                                    <x-dropdown-button-li>
                                        <x-dropdown-button-input id="puzzle-mb"></x-dropdown-button-input>
                                        <x-dropdown-button-label for="puzzle-mb">Puzzle</x-dropdown-button-label>
                                    </x-dropdown-button-li>
                                    <x-dropdown-button-li>
                                        <x-dropdown-button-input id="competitive-mb"></x-dropdown-button-input>
                                        <x-dropdown-button-label for="competive-mb">Competitive</x-dropdown-button-label>
                                    </x-dropdown-button-li>
                                    <x-dropdown-button-li>
                                        <x-dropdown-button-input id="stratergy-mb"></x-dropdown-button-input>
                                        <x-dropdown-button-label for="stratergy-mb">Stratergy</x-dropdown-button-label>
                                    </x-dropdown-button-li>
                                </x-dropdown-button-body>
                            </x-td>
                        </x-tr>
                    </x-table-body>
                </x-table>
            </x-accordion-body>
        </x-accordion-head>
    </div>
