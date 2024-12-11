<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Checkout</h1>
    </x-slot>



<div class="flex max-md:flex-col max-md:items-center justify-between p-4 w-full">
        <div class="w-1/4 border-solid border-2 border-gray-500 rounded-lg shadow-xl p-4 max-md:w-4/5">
            @include('layouts/checkout-box')
        </div>
        @php
            $int = 0;
        @endphp
        @if ($carts)
        <div class="flex flex-row flex-wrap justify-center items-center">
            @foreach ($carts as $cart)
                <div class="flex md:flex-col max-md:min-w-64 max-md:w-2/5 max-md:flex-row max-md:flex-wrap items-center w-1/4 bg-white border border-gray-500 rounded-lg shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 m-4">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{$products[$int]->image}}" alt="{{$products[$int]->name}}">
                    <div class="flex flex-col justify-between p-4 leading-normal text-center items-center">
                        <span class="flex mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$products[$int]->name}}</span>
                        <span class="flex mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">£{{$products[$int]->Price}}</span>
                        <span class="flex mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$cart->amount}}</span>
                        <div class="flex mb-3 font-normal text-gray-700 dark:text-gray-400">
                            <form action="{{ route('checkout.index')}}" method="POST">
                                <label for="Quantity">Pick the amount you want to reduce the amount by</label>
                                <br>
                                <input type="number" name="quantity" id="quantity" min="0" max="99">
                                <input type="hidden" name="product_id_to_change" value="{{$products[$int]->product_id}}">
                                <br>
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
                @php
                    $int++;
                @endphp
            @endforeach
        </div>
            <div>

            </div>
        @else
            <h2>No Products To Display</h2>
        @endif



</div>

<div class= "checkout-functions">

            <a href="receipt.php" class="checkout-main-small-buttons">
            <div class ="checkout-buttons"> PRINT LAST RECEIPT</div> </a>

  </section>


</x-app-layout>
