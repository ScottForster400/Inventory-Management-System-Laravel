
    <x-th>
        {{$product->product_id }}
    </x-th>
    <x-td class="max-sm:hidden">
        {{Str::limit($product->name,20, '...')}}
    </x-td>
    <x-td class="sm:hidden">
        {{Str::limit($product->name,10, '...')}}
    </x-td>
    <x-td class="max-sm:hidden">
        {{$stock[$int]->amount}}
    </x-td>
    <x-td class="max-sm:hidden">
        £{{$product->Price}}
    </x-td>
    <x-td class="flex flex-row">
        <div class="basis-1/2 pr-3">
            @include('layouts.edit-stock-modal')
        </div>
        <div class="max-sm:hidden basis-1/2 pl-3">
            <form method="POST" action="{{ route('stocks.destroy', $product->product_id) }}" class="inline">
                @csrf
                @method('DELETE')
                <x-danger-button class=" !w-full !py-3 ml-3 !h-12 hover:!bg-red-800 !transition-colors max-sm:!w-full max-sm:m-2 max-sm:!h-14 flex justify-center items-center !rounded-3xl" onclick="return confirm('Are you sure you would like to delete this product')" >Delete Stock</x-danger-button>
            </form>
        </div>
    </x-td>


