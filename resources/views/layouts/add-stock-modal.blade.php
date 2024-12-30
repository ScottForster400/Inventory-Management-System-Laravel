<x-modal id="add-stock" class="bg-gray-500 bg-opacity-75 h-full">
    <x-modal-header data-modal-hide="add-stock">
        Add Stock
    </x-modal-header>
    <form action="{{ route($addRoute)}}" method="post">
        {{-- prevents cross site request forgeries --}}
        @csrf
        <x-modal-body>
                <x-table>
                    <x-table-body>
                        <x-tr class="max-sm:flex max-sm:flex-col">
                            <x-td class="max-sm:w-full relative py-5">
                                <x-input-label for="name" :value="__('Product Name')" >Product Name</x-input-label>
                                <x-text-input id="name" type="text" name="name" class="w-full basis-1/" value="{{@old('name')}}"></x-text-input>
                                @error('name')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                            <x-td class="relative py-5">
                                <x-input-label for="price" :value="__('Price(£)')">Price(£)</x-input-label>
                                <x-text-input id="price" type="number" name="price" step=".01" class="w-full basis-1/2" max="9999" value="{{@old('price')}}" ></x-text-input>
                                @error('price')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                            <x-td class="relative py-5">
                                <x-input-label for="manufacturer" :value="__('Manufacturer')" >Manufacturer</x-input-label>
                                <x-text-input id="manufacturer" type="text" name="manufacturer" class="w-full basis-1/2" value="{{@old('manufacturer')}}" ></x-text-input>
                                @error('manufacturer')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col">
                            <x-td class="relative py-5">
                                <x-input-label for="age_rating" :value="__('Age Rating')" >Age Rating</x-input-label>
                                <x-text-input id="age_rating" type="number" name="age_rating" min=0  class="w-full basis-1/2" max="9999" value="{{@old('age_rating')}}" ></x-text-input>
                                @error('age_rating')
                                <x-error-message-form>{{$message}}</x-error-message-form>
                                 @enderror
                            </x-td>
                            <x-td class="relative py-5">
                                <x-input-label for="amount" :value="__('Amount')">Amount</x-input-label>
                                <x-text-input id="amount" type="number" name="amount" min=0 class="w-full basis-1/2" value="{{@old('amount')}}" ></x-text-input>
                                @error('amount')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                            <x-td class="relative py-5">
                                <x-input-label for="game_length" :value="__('Game Length')" >Game Length</x-input-label>
                                <x-text-input id="game_length" type="number" name="game_length" min=0 class="w-full basis-1/2" max="9999" value="{{@old('game_length')}}" ></x-text-input>
                                @error('game_length')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col">
                            <x-td class="relative py-5">
                                <x-input-label for="game_type" :value="__('Game Type')" >Game Type</x-input-label>
                                <x-select id="game_type" name="game_type"  class="w-full basis-1/2">
                                    <option value="">Choose an option...</option>
                                    <option value="board_game">Board Game</option>
                                    <option value="puzzle_game">Puzzles</option>
                                    <option value="figures">Figures</option>
                                    <option value="card_game">Card Game</option>
                                </x-select>
                                @error('game_type')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                            <x-td class="relative py-5">
                                <x-input-label for="game_genre" :value="__('Game Genre')" >Game Genre</x-input-label>
                                <x-select id="game_genre" name="game_genre"  class="w-full basis-1/2">
                                    <option value="">Choose an option...</option>
                                    <option value="adventure">Adventure</option>
                                    <option value="puzzle">Puzzle</option>
                                    <option value="competitive">Competitive</option>
                                    <option value="strategy">Strategy</option>
                                </x-select>
                                @error('game_genre')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                            <x-td class="relative py-5">
                                <x-input-label for="min_players" :value="__('Min Players')">Min Players</x-input-label>
                                <x-text-input id="min_players" type="number" name="min_players" min=0 class="w-full basis-1/2" max="9999" value="{{@old('min_players')}}" ></x-text-input>
                                @error('min_players')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                        </x-tr>
                        <x-tr class="max-sm:flex max-sm:flex-col">
                            <x-td class="relative py-5">
                                <x-input-label for="max_players" :value="__('Max Players')">Max Players</x-input-label>
                                <x-text-input id="max_players" type="number" name="max_players" min=0 class="w-full basis-1/2" max="9999" value="{{@old('max_players')}}" ></x-text-input>
                                @error('max_players')
                                    <x-error-message-form>{{$message}}</x-error-message-form>
                                @enderror
                            </x-td>
                        </x-tr>
                    </x-table-body>
                </x-table>
                <div class="w-full relative">
                    <x-input-label for="description" :value="__('Description')" >Description</x-input-label>
                    <textarea id="description" name="description" rows="4" class="block resize-none p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description..." value="{{@old('description')}}" ></textarea>
                    @error('description')
                        <x-error-message-form>{{$message}}</x-error-message-form>
                    @enderror
                </div>
            </x-modal-body>
        <div class="flex items-center max-sm:justify-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <x-primary-button class="!py-3 !bg-blue-700 hover:!bg-blue-800 !transition-colors">Add Stock</x-primary-button>
        </div>
    </form>
</x-modal>
