<x-modal-toggle data-modal-target="edit{{$product->product_id}}" data-modal-toggle="edit{{$product->product_id}}" class="w-1/3 h-12 flex justify-center items-center !rounded-full !bg-blue-700 hover:!bg-blue-800 !transition-colors">Edit</x-modal-toggle>
<x-modal id="edit{{$product->product_id}}" class="bg-gray-500 bg-opacity-75 h-full">
    <x-modal-header data-modal-hide="edit{{$product->product_id}}">
        Edit Stock
    </x-modal-header>
        <x-modal-body>
            <form action="{{route('dashboard.update',$product)}}" method="post">
                @method('put')
                @csrf
                <x-table>
                    <x-table-body>
                        <x-tr class="max-sm:flex max-sm:flex-col">
                            <x-td class="max-sm:w-full relative py-5">
                                <x-input-label for="name" :value="__('Product Name')" >Product Name</x-input-label>
                                <x-text-input id="name" type="text" name="name" class="w-full basis-1/2" value="{{$product->name}}"></x-text-input>
                                @error('name')
                                <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                            <x-td class="relative py-5">
                                <x-input-label for="price" :value="__('Price(£)')">Price(£)</x-input-label>
                                <x-text-input id="price" type="number" name="price" step=".01" class="w-full basis-1/2" value="{{$product->Price}}"></x-text-input>
                                @error('price')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                            <x-td class="relative py-5">
                                <x-input-label for="manufacturer" :value="__('Manufacturer')" >Manufacturer</x-input-label>
                                <x-text-input id="manufacturer" type="text" name="manufacturer" class="w-full basis-1/2" value="{{$product->manufacturer}}"></x-text-input>
                                @error('manufacturer')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col">
                            <x-td class="relative py-5">
                                <x-input-label for="age_rating" :value="__('Age Rating')" >Age Rating</x-input-label>
                                <x-text-input id="age_rating" type="number" name="age_rating" min=0  class="w-full basis-1/2" value="{{$product->age_rating}}"></x-text-input>
                                @error('age_rating')
                                <x-error-message-form>{{$message}}</x-error-message-form>
                                 @enderror
                            </x-td>
                            <x-td class="relative py-5">
                                <x-input-label for="amount" :value="__('Amount')">Amount</x-input-label>
                                <x-text-input id="amount" type="number" name="amount" min=0 class="w-full basis-1/2" value="{{$stock[$int]->amount}}"></x-text-input>
                                @error('amount')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                            <x-td class="relative py-5">
                                <x-input-label for="game_length" :value="__('Game Length')" >Game Length</x-input-label>
                                <x-text-input id="game_length" type="number" name="game_length" min=0 class="w-full basis-1/2" value="{{$product->game_length}}"></x-text-input>
                                @error('game_length')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col">
                            <x-td class="relative py-5">
                                <x-input-label for="game_type" :value="__('Game Type')" >Game Type</x-input-label>
                                <x-select id="game_type" name="game_type" class="w-full basis-1/2">
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
                                @error('game_type')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                            <x-td class="relative py-5">
                                <x-input-label for="game_genre" :value="__('Game Genre')" >Game Genre</x-input-label>
                                <x-select id="game_genre"  name="game_genre" class="w-full basis-1/2">
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
                                @error('game_genre')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                            <x-td class="relative py-5">
                                <x-input-label for="min_players" :value="__('Min Players')">Min Players</x-input-label>
                                <x-text-input id="min_players" type="number" name="min_players" min=0 class="w-full basis-1/2" value="{{$product->minimum_player_count}}"></x-text-input>
                                @error('min_players')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col">
                            <x-td class="relative py-5">
                                <x-input-label for="max_players" :value="__('Max Players')">Max Players</x-input-label>
                                <x-text-input id="max_players" type="number" name="max_players" min=0 class="w-full basis-1/2" value="{{$product->maximum_player_count}}"></x-text-input>
                                @error('max_players')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                        </x-tr>
                    </x-table-body>
                </x-table>
                <div class="w-full relative">
                    <x-input-label for="description" :value="__('Description')" >Description</x-input-label>
                    <textarea id="description" rows="4" name="description" class="block resize-none p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description..." >{{$product->description}}</textarea>
                    @error('description')
                        <x-error-message-form>{{$message}}</x-error-message-form>
                    @enderror
                </div>
            </x-modal-body>
            <div class="flex items-center max-sm:flex-wrap justify-between max-sm:justify-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <x-primary-button class="!py-3 !bg-blue-700 hover:!bg-blue-800 !transition-colors max-sm:!w-1/3 max-sm:m-2 max-sm:!h-14 justify-center items-center">Edit Stock</x-primary-button>
            </form>
                <x-primary-button data-modal-target="img{{$product->product_id}}" data-modal-toggle="img{{$product->product_id}}" data-modal-hide="edit{{$product->product_id}}" class="!py-3 !bg-blue-700 hover:!bg-blue-800 !transition-colors max-sm:!w-1/3 max-sm:m-2 max-sm:!h-14 justify-center items-center ">Image Upload</x-primary-button>
                <form action="{{route('dashboard.destroy', $product)}}" method="post" class="max-sm:w-1/3 flex justify-center items-center">
                    @method('delete')
                    @csrf
                    <x-danger-button class="!py-3 hover:!bg-red-800 !transition-colors max-sm:!w-full max-sm:m-2 max-sm:!h-14 flex justify-center items-center" onclick="return confirm('Are you sure you would like to delete this product')" >Delete Stock</x-danger-button>
                </form>
            </div>
</x-modal>
