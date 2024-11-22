<x-modal id="add-stock" class="bg-gray-500 bg-opacity-75 h-full">
    <x-modal-header data-modal-hide="add-stock">
        Add Stock
    </x-modal-header>
    <form action="">
        <x-modal-body>
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
                            <x-td>
                                <x-input-label for="amount" :value="__('Amount')">Amount</x-input-label>
                                <x-text-input id="amount" type="number" name="player-count" min=0 class="w-full basis-1/2"></x-text-input>
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
