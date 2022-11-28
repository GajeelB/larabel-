<!doctype html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Resumen del contenido de la página">
    <title>@yield("tittle")</title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</head>

<body class="bg-gray-900 ">

<nav
    class="bg-sky-900 border-gray-200 px-2 sm:px-4 py-2.5 border-2 border-b-sky-400 border-sky-900 rounded-b-lg dark:bg-gray-900">
    <div class="container flex flex-wrap items-center justify-between mx-auto">

        <div class="flex items-center md:order-2">
            @if(Auth::check())
                <button type="button"
                        class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{asset("img/user.jpeg")}}" alt="user photo">
                </button>
                <!-- User menu -->
                <div
                    class="z-50 hidden my-4 text-base list-none bg-blue-800 divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-400 dark:text-white">{{Auth::user()->name}}</span>
                        <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{Auth::user()->email}}</span>
                    </div>
                    <ul class="py-1" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#"
                               class="block px-4 py-2 text-sm text-white hover:text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Inici</a>
                        </li>
                        <li>
                            <a href="{{route("usuaris.posts.index",Auth::user()->username)}}"
                               class="block px-4 py-2 text-sm text-white hover:text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Els meus posts</a>
                        </li>
                        <li>
                            <a href="{{route("usuaris.show", Auth::user()->username)}}"
                               class="block px-4 py-2 text-sm text-white hover:text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Perfil</a>
                        </li>
                        <li>
                            <form action="{{route("usuaris.logout")}}" method="post">
                                @csrf
                                <button class="w-full text-start block px-4 py-2 text-sm text-red-500 hover:text-red-800 hover:bg-red-500 ">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
            <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                @if(!Auth::check())
                    <li>
                        <a href="/"
                           class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:p-0 dark:text-white"
                           aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{route("usuaris.login")}}"
                           class="block py-2 pl-3 text-gray-400 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Entrar</a>
                    </li>
                    <li>
                        <a href="{{route("usuaris.create")}}"
                           class="block py-2 pl-3 text-gray-400 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Registrar</a>
                    </li>

                @else
                    <li>
                        <a href="{{route("posts.latest")}}"
                           class="block py-2 pl-3 text-gray-400 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Novetats</a>
                    </li>
                    @if(Auth::user()->is_admin)
                        <li>
                            <a href="{{route("usuaris.index")}}"
                               class="block py-2 pl-3 text-gray-400 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-white md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">LLista Usuaris</a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>
<main>
    @yield("section")
</main>

<footer
    class="fixed bottom-0 left-0 z-20 p-4 w-full border-t border-gray-200 md:flex md:items-center md:justify-between md:p-6 bg-sky-900 border-2 rounded-t-lg border-sky-900 border-t-sky-400">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/"
                                                                                    class="hover:underline">GB</a>. All Rights Reserved.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
        </li>
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
        </li>
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
        </li>
        <li>
            <a href="#" class="hover:underline">Contact</a>
        </li>
    </ul>
</footer>

</body>

</html>
