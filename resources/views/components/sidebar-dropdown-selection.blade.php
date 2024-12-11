<label for="underline_select" class="sr-only pl-2">Underline select</label>
<select {{ $attributes->merge([ 'id' => 'underline_select', 'class' => 'block p-2 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer'])}}>
    {{$slot}}
</select>

