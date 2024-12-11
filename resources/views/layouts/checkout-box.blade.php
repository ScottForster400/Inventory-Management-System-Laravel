@if ($carts)
    <h2>Cart Summary</h2>
    @php
        $int = 0;
    @endphp
    <x-table class="flex justify-between p-1 border-b align-middle ">
        <x-table-head>
            <x-tr>
                <x-th class="font-bold text-black">
                    Product Name
                </x-th>
                <x-th class="font-bold text-black">
                    Price
                </x-th>
                <x-th class="font-bold text-black">
                    Amount
                </x-th>
            </x-tr>
        </x-table-head>
        <x-table-body>
            @foreach ($carts as $cart)
                <x-tr>
                    <x-th class="font-bold text-gray-500">
                        {{$products[$int]->name}}
                    </x-th>
                    <x-th class="font-bold text-gray-500">
                        £{{$products[$int]->Price}}
                    </x-th>
                    <x-th class="font-bold text-gray-500">
                        {{$cart->amount}}
                    </x-th>
                </x-tr>
                @php
                    $int++;
                @endphp
            @endforeach
        </x-table-body>
    </x-table>
@else
    <h2>No Products In Cart</h2>
@endif
</ul>
<div class="total">
    <span>Total:</span>
    @if ($amount)
        <span class="total-amount">£{{$amount}}</span>
    @endif
</div>
<form method="POST" action="{{ route('checkout.destroy' , $user)}}">
    @method('delete')
    @csrf
    <input class="pay-button" type="submit" value="Checkout">
</form>

