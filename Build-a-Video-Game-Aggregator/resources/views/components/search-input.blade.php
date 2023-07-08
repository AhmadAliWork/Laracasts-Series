<div class="relative">
    <input
        type="search"
        {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm bg-gray-800 text-sm rounded-full focus:outline-none focus:shadow-outline w-64 px-3 py-1 pl-8']) !!} placeholder="Search...">
    <span class="absolute top-0 flex items-center h-full ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                 class=" text-gray-400 w-4 h-4">
                <path fill-rule="evenodd"
                      d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                      clip-rule="evenodd"/>
            </svg>
        </span>
</div>
