<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-row">
        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>

         <aside id="default-sidebar" class=" flex-1/4 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800 ">
               <ul class="space-y-2 font-medium">
                    <li>
                        <x-sidebar-dropdown-button data-collapse-toggle="price">
                           <x-sidebar-img src="{{asset('imgs/price.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Price</x-sidebar-dropdown-info>
                        </x-sidebar-dropdown-button>
                        <ul id="price" class="hidden py-2 space-y-2">
                            <li>
                                <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <x-sidebar-dropdown-button data-collapse-toggle="age">
                            <x-sidebar-img src="{{asset('imgs/age.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Age</x-sidebar-dropdown-info>
                         </x-sidebar-dropdown-button>
                         <ul id="aSge" class="hidden py-2 space-y-2">
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                             </li>
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
                             </li>
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                             </li>
                         </ul>
                    </li>
                    <li>
                        <x-sidebar-dropdown-button data-collapse-toggle="time">
                            <x-sidebar-img src="{{asset('imgs/time.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Time</x-sidebar-dropdown-info>
                         </x-sidebar-dropdown-button>
                         <ul id="time" class="hidden py-2 space-y-2">
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                             </li>
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
                             </li>
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                             </li>
                         </ul>
                    </li>
                    <li>
                        <x-sidebar-dropdown-button data-collapse-toggle="player-count">
                            <x-sidebar-img src="{{asset('imgs/player-count.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Player Count</x-sidebar-dropdown-info>
                         </x-sidebar-dropdown-button>
                         <ul id="player-count" class="hidden py-2 space-y-2">
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                             </li>
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
                             </li>
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                             </li>
                         </ul>
                    </li>
                    <li>
                        <x-sidebar-dropdown-button data-collapse-toggle="game-type">
                            <x-sidebar-img src="{{asset('imgs/game-type.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Game Type</x-sidebar-dropdown-info>
                         </x-sidebar-dropdown-button>
                         <ul id="game-type" class="hidden py-2 space-y-2">
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                             </li>
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
                             </li>
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                             </li>
                         </ul>
                    </li>
                    <li>
                        <x-sidebar-dropdown-button data-collapse-toggle="game-genre">
                            <x-sidebar-img src="{{asset('imgs/game-genre.svg')}}"></x-sidebar-img>
                            <x-sidebar-dropdown-info>Game Genre</x-sidebar-dropdown-info>
                         </x-sidebar-dropdown-button>
                         <ul id="game-genre" class="hidden py-2 space-y-2">
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                             </li>
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
                             </li>
                             <li>
                                 <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                             </li>
                         </ul>
                    </li>
                    <li>

                    </li>
               </ul>
            </div>
         </aside>

        <div class="py-12 w-full">
            <div class="flex flex-3/4 pl-20 pr-20 max-w-8/10 w-full">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
