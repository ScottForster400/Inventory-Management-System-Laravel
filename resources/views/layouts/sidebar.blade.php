<div class="max-md:hidden">
    <aside id="default-sidebar" class="  w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
       <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800 ">
          <ul class="space-y-2 font-medium w-full max-w-full">
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
                   <x-sidebar-dropdown-button data-collapse-toggle="age">
                       <x-sidebar-img src="{{asset('imgs/age.svg')}}"></x-sidebar-img>
                       <x-sidebar-dropdown-info>Age</x-sidebar-dropdown-info>
                    </x-sidebar-dropdown-button>
                    <ul id="age" class="hidden py-2 space-y-2">
                        <x-sidebar-list >
                           <x-primary-input-button-outline id="0-2"></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="0-2" class="w-4/5">0-2</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="2-4"></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="2-4" class="w-4/5">2-4</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="4-6" ></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="4-6" class="w-4/5">4-6</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="6-10" ></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="6-10" class="w-4/5">6-10</x-primary-input-button-outline-label>
                       </x-sidebar-list>
                       <x-sidebar-list>
                           <x-primary-input-button-outline id="10+" ></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="10+" class="w-4/5">10 +</x-primary-input-button-outline-label>
                       </x-sidebar-list>
                    </ul>
               </li>
               <li>
                   <x-sidebar-dropdown-button data-collapse-toggle="time">
                       <x-sidebar-img src="{{asset('imgs/time.svg')}}"></x-sidebar-img>
                       <x-sidebar-dropdown-info>Time</x-sidebar-dropdown-info>
                    </x-sidebar-dropdown-button>
                    <ul id="time" class="hidden py-2 space-y-2">
                       <x-sidebar-list >
                           <x-primary-input-button-outline id="0-15"></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="0-15" class="w-4/5">&lt; 15</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="15-30"></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="15-30" class="w-4/5">&lt; 30</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="30-45" ></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="30-45" class="w-4/5">&lt; 45</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="45-60" ></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="45-60" class="w-4/5">60 +</x-primary-input-button-outline-label>
                       </x-sidebar-list>
                    </ul>
               </li>
               <li>
                   <x-sidebar-dropdown-button data-collapse-toggle="player-count">
                       <x-sidebar-img src="{{asset('imgs/player-count.svg')}}"></x-sidebar-img>
                       <x-sidebar-dropdown-info>Player Count</x-sidebar-dropdown-info>
                    </x-sidebar-dropdown-button>
                    <ul id="player-count" class="hidden py-2 space-y-2">
                       <x-sidebar-list >
                           <x-primary-input-button-outline id="0-4"></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="0-4" class="w-4/5">&lt; 4</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="<6"></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="<6" class="w-4/5">&lt; 6</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="6-8" ></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="6-8" class="w-4/5">&lt; 8</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="8-10" ></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="8-10" class="w-4/5">10 +</x-primary-input-button-outline-label>
                       </x-sidebar-list>
                    </ul>
               </li>
               <li>
                   <x-sidebar-dropdown-button data-collapse-toggle="game-type">
                       <x-sidebar-img src="{{asset('imgs/game-type.svg')}}"></x-sidebar-img>
                       <x-sidebar-dropdown-info>Game Type</x-sidebar-dropdown-info>
                   </x-sidebar-dropdown-button>
                   <ul id="game-type" class="hidden py-2 space-y-2">
                       <x-sidebar-list >
                           <x-primary-input-button-outline id="board-game"></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="board-game" class="w-4/5">Board Games</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="puzzle-game"></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="puzzle-game" class="w-4/5">Puzzles</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="figures" ></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="figures" class="w-4/5">Figures</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="card-game" ></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="card-game" class="w-4/5">Card Games</x-primary-input-button-outline-label>
                       </x-sidebar-list>
                   </ul>
               </li>
               <li>
                   <x-sidebar-dropdown-button data-collapse-toggle="game-genre">
                       <x-sidebar-img src="{{asset('imgs/game-genre.svg')}}"></x-sidebar-img>
                       <x-sidebar-dropdown-info>Game Genre</x-sidebar-dropdown-info>
                    </x-sidebar-dropdown-button>
                    <ul id="game-genre" class="hidden py-2 space-y-2">
                       <x-sidebar-list >
                           <x-primary-input-button-outline id="adventure"></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="adventure" class="w-4/5">Adventure</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="puzzle"></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="puzzle" class="w-4/5">Puzzle</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="competitive" ></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="competitive" class="w-4/5">Competitive</x-primary-input-button-outline-label>
                        </x-sidebar-list>
                        <x-sidebar-list>
                           <x-primary-input-button-outline id="stratergy" ></x-primary-input-button-outline>
                           <x-primary-input-button-outline-label for="stratergy" class="w-4/5">Strategy</x-primary-input-button-outline-label>
                       </x-sidebar-list>
                    </ul>
               </li>
               <li>

               </li>
          </ul>
       </div>
    </aside>
</div>
