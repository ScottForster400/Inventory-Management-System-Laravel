<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-row w-full">
        @include('layouts.sidebar')
        <div class=" w-full py-12  flex items-center flex-col ">
            <div class="flex flex-3/4 pl-20 pr-20 max-w-8/10 w-full">
                <div class=" overflow-hidden w-full">
                    <div class=" flex flex-row flex-wrap justify-evenly p-6 text-gray-900 dark:text-gray-100 ">
                        @foreach ($products as $product)
                            <x-card-main class="flex flex-col mb-5 mx-5 hover:shadow-2xl transition-shadow text-center">
                                <x-card-img src="{{asset('imgs/logo.png')}}"></x-card-img>
                                <x-card-body>
                                    <x-card-title>{{$product->name}}</x-card-title>
                                    <x-card-para>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat recusandae aliquid quis animi unde at reprehenderit voluptatibus iste laborum in, voluptas possimus quam quos minima corporis nam error aperiam laboriosam.</x-card-para>
                                    <x-card-links>SAmple links</x-card-links>
                                </x-card-body>
                            </x-card-main>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
