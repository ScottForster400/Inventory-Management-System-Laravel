<button {{$attributes->merge(['type'=>'button','class' => 'flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700', 'aria-controls' => 'dropdown-example'])}}>
    {{$slot}}
</button>
