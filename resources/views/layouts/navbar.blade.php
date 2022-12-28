<nav
    class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="{{ route('pages.index') }}" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo">
            <span class="self-center text-xl font-semibold whitespace-nowrap text-dark-400">RedLine</span>
        </a>
        <div class="flex md:order-2">
            <button type="button"
                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a
                    href={{ route('pages.donate_form') }}>Be a Donor</a></button>
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
                <li>
                    <a href="{{ route('pages.why_donate') }}"
                        class="block py-2 pl-3 pr-4 {{ Route::currentRouteName() == 'pages.why_donate' ? 'text-red-500' : 'text-gray-700' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-700"
                        aria-current="page">Why Donate</a>
                </li>
                <li>
                    <a href="{{ route('pages.donate') }}"
                        class="block py-2 pl-3 pr-4 {{ Route::currentRouteName() == 'pages.donate' ? 'text-red-500' : 'text-gray-700' }} rounded hover:bg-gray-100 md:hover:bg-transparent">Donate</a>
                </li>
                <li>
                    <a href="{{ route('pages.events') }}"
                        class="block py-2 pl-3 pr-4 {{ Route::currentRouteName() == 'pages.events' ? 'text-red-500' : 'text-gray-700' }} rounded hover:bg-gray-100 md:hover:bg-transparent">Events</a>
                </li>
                <li>
                    <a href="{{ route('pages.about') }}"
                        class="block py-2 pl-3 pr-4 {{ Route::currentRouteName() == 'pages.about' ? 'text-red-500' : 'text-gray-700' }} rounded hover:bg-gray-100 md:hover:bg-transparent">About
                        us</a>
                </li>
                <li>
                    <button class="inline-block relative">
                        <a href="#" class="block py-2 pl-3">
                            <p style="color:#cf3d3c"><u>Live Update
                        <span class="animate-ping absolute top-1 right-0.5 block h-1 w-1 rounded-full ring-2 ring-red-400 bg-red-600"></span>    
                    </u></p>
                        </a>
                    </button>                    
                </li>
            </ul>
        </div>
    </div>
</nav>
