
    <x-th>
        {{$product->product_id }}
    </x-th>
    <x-td>
        {{Str::limit($product->name,20, '...')}}
    </x-td>
    <x-td>
        {{$stock[$int]->amount}}
    </x-td>
    <x-td>
        £{{$product->Price}}
    </x-td>
    <x-td class="flex flex-row">
        @include('layouts.edit-stock-modal')
        <form method="POST" action="{{ route('stocks.destroy', $product->product_id) }}" class="inline">
            @csrf
            @method('DELETE')
            <x-danger-button class=" !py-3 ml-3 !h-12 hover:!bg-red-800 !transition-colors max-sm:!w-full max-sm:m-2 max-sm:!h-14 flex justify-center items-center !rounded-3xl" onclick="return confirm('Are you sure you would like to delete this product')" >Delete Stock</x-danger-button>
        </form>
    </x-td>


