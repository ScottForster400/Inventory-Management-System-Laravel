<x-modal-toggle data-modal-target="edit{{$product->product_id}}" data-modal-toggle="edit{{$product->product_id}}" class="w-1/3 h-12 flex justify-center items-center !rounded-full !bg-blue-700 hover:!bg-blue-800 !transition-colors">Edit</x-modal-toggle>
<x-modal id="edit{{$product->product_id}}" class="bg-gray-500 bg-opacity-75 h-full">
    <x-modal-header data-modal-hide="edit{{$product->product_id}}">
        Edit Stock
    </x-modal-header>
    <form action="">
        <x-modal-body>
                <x-table>
                    <x-table-body>
                        <x-tr class="max-sm:flex max-sm:flex-col">
                            <x-td class="max-sm:w-full">
                                <x-input-label for="min-price" :value="__('Product Name')" >Product Name</x-input-label>
                                <x-text-input id="min-price" type="text" name="name" class="w-full basis-1/2" value="{{$product->name}}"></x-text-input>
                            </x-td>
                            <x-td >
                                <x-input-label for="price" :value="__('Price(£)')">Price(£)</x-input-label>
                                <x-text-input id="price" type="number" name="price"  class="w-full basis-1/2" value="{{$product->Price}}"></x-text-input>
                            </x-td>
                            <x-td>
                                <x-input-label for="manufacturer" :value="__('Manufacturer')" >Manufacturer</x-input-label>
                                <x-text-input id="manufacturer" type="text" name="Manufacturer" class="w-full basis-1/2" value="{{$product->manufacturer}}"></x-text-input>
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col">
                            <x-td>
                                <x-input-label for="age-rating" :value="__('Age Rating')" >Age Rating</x-input-label>
                                <x-text-input id="age-rating" type="number" name="age-rating" min=0  class="w-full basis-1/2" value="{{$product->age_rating}}"></x-text-input>
                            </x-td>
                            <x-td>
                                <x-input-label for="amount" :value="__('Amount')">Amount</x-input-label>
                                <x-text-input id="amount" type="number" name="player-count" min=0 class="w-full basis-1/2" value="{{$stock[$int]->amount}}"></x-text-input>
                            </x-td>
                            <x-td>
                                <x-input-label for="game-length" :value="__('Game Length')" >Game Length</x-input-label>
                                <x-text-input id="game-length" type="number" name="game-length" min=0 class="w-full basis-1/2" value="{{$product->game_length}}"></x-text-input>
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col">
                            <x-td>
                                <x-input-label for="game-type" :value="__('Game Type')" >Game Type</x-input-label>
                                <x-select id="game-type"  class="w-full basis-1/2">
                                    @if ($product->game_type == "board_game")
                                        <option value="board_game" selected>Board Game</option>
                                        <option value="puzzle_game">Puzzles</option>
                                        <option value="figures">Figures</option>
                                        <option value="card_game">Card Game</option>

                                    @elseif ($product->game_type == "puzzle_game")
                                        <option value="board_game">Board Game</option>
                                        <option value="puzzle_game" selected>Puzzles</option>
                                        <option value="figures">Figures</option>
                                        <option value="card_game">Card Game</option>

                                    @elseif ($product->game_type == "figures")
                                        <option value="board_game">Board Game</option>
                                        <option value="puzzle_game">Puzzles</option>
                                        <option value="figures" selected>Figures</option>
                                        <option value="card_game">Card Game</option>

                                    @elseif ($product->game_type == "card_game")
                                        <option value="board_game">Board Game</option>
                                        <option value="puzzle_game">Puzzles</option>
                                        <option value="figures">Figures</option>
                                        <option value="card_game" selected>Card Game</option>

                                    @else
                                        <option value="">Choose an option...</option>
                                        <option value="board_game">Board Game</option>
                                        <option value="puzzle_game">Puzzles</option>
                                        <option value="figures">Figures</option>
                                        <option value="card_game">Card Game</option>
                                    @endif
                                </x-select>
                            </x-td>
                            <x-td class="">
                                <x-input-label for="game-genre" :value="__('Game Genre')" >Game Genre</x-input-label>
                                <x-select id="game-genre"  class="w-full basis-1/2">
                                @if ($product->game_genre == "adventure")
                                    <option value="adventure" selected>Adventure</option>
                                    <option value="puzzle">Puzzle</option>
                                    <option value="competitive">Competitive</option>
                                    <option value="strategy">Strategy</option>

                                @elseif ($product->game_genre == "puzzle")
                                    <option value="adventure">Adventure</option>
                                    <option value="puzzle" selected>Puzzle</option>
                                    <option value="competitive">Competitive</option>
                                    <option value="strategy">Strategy</option>

                                @elseif ($product->game_genre == "competitive")
                                    <option value="adventure">Adventure</option>
                                    <option value="puzzle">Puzzle</option>
                                    <option value="competitive" selected>Competitive</option>
                                    <option value="strategy">Strategy</option>

                                @elseif ($product->game_genre == "strategy")
                                    <option value="adventure">Adventure</option>
                                    <option value="puzzle">Puzzle</option>
                                    <option value="competitive">Competitive</option>
                                    <option value="strategy" selected>Strategy</option>

                                @else
                                    <option value="">Choose an option...</option>
                                    <option value="adventure">Adventure</option>
                                    <option value="puzzle">Puzzle</option>
                                    <option value="competitive">Competitive</option>
                                    <option value="strategy">Strategy</option>
                                @endif
                                </x-select>
                            </x-td>
                            <x-td>
                                <x-input-label for="player-count" :value="__('Min Players')">Min Players</x-input-label>
                                <x-text-input id="player-count" type="number" name="player-count" min=0 class="w-full basis-1/2" value="{{$product->minimum_player_count}}"></x-text-input>
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col">
                            <x-td>
                                <x-input-label for="player-count" :value="__('Max Players')">Max Players</x-input-label>
                                <x-text-input id="player-count" type="number" name="player-count" min=0 class="w-full basis-1/2" value="{{$product->maximum_player_count}}"></x-text-input>
                            </x-td>
                        </x-tr>
                    </x-table-body>
                </x-table>
                <div class="w-full">
                    <x-input-label for="description" :value="__('Description')" >Description</x-input-label>
                    <textarea id="description" rows="4" class="block resize-none p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description..." >{{$product->description}}</textarea>
                </div>
            </x-modal-body>
        <x-modal-footer>
            Edit Stock
        </x-modal-footer>
    </form>
</x-modal>