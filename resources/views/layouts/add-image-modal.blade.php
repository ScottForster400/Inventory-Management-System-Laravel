
<x-modal id="img{{$product->product_id}}" class="bg-gray-500 bg-opacity-75 h-full">
    <x-modal-header data-modal-hide="img{{$product->product_id}}">
        Edit Stock
    </x-modal-header>
    <form action="{{route('dashboard.update',$product)}}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="hidden" value="{{$product->product_id}}">
        <x-modal-body>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  for="file_input">Upload file</label>
            <input type="file" name="img" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF.</p>
        </x-modal-body>
        <div class="flex items-center justify-between max-sm:justify-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <x-primary-button class="!py-3 !bg-blue-700 hover:!bg-blue-800 !transition-colors">Edit Stock</x-primary-button>
         </div>
    </form>
</x-modal>
