<!doctype html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Resumen del contenido de la página">
    <title>@yield("tittle")</title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="dark:bg-gray-900">
<nav class="px-2 bg-sky-900 border-2 border-b-sky-400 border-sky-900 rounded-b-lg ">
    <div class="container flex flex-wrap h-full items-center mx-auto">
        <button data-collapse-toggle="navbar-multi-level" type="button"
                class="inline-flex justify-center items-center ml-3 text-gray-400 rounded-lg md:hidden hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-500"
                aria-controls="navbar-multi-level" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block mr-9" id="navbar-multi-level">
            <ul class="flex w-full justify-between">
                <div
                    class="flex ml-9 items-end justify-between flex-col align-middle py-5 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 w-1/6">
                    <li>
                        <a href="/"
                           class="menu-itemp text-xl"
                           aria-current="page">Home</a>
                    </li>
                </div>

                <div
                    class="flex items-end justify-between flex-col align-middle py-5 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 w-auto">
                    @if(Auth::check())
                        <li class="h-full">
                            <a href="{{route("usuari.edit", Auth::id())}}"
                               class="menu-itemp text-xl">Editar Perfil</a>
                        </li>
                        <li class="h-full ">
                            <form action="{{route("usuari.logout")}}" method="post">
                                @csrf
                                <button class="menu-itemp text-xl">Log Out</button>
                            </form>

                        </li>
                    @else
                        <li class="h-full">
                            <a href="{{route("usuari.create")}}"
                               class="menu-itemp text-xl">Registrar</a>
                        </li>

                        <li class="h-full ">
                            <a href="{{route("usuari.login")}}"
                               class="menu-itemp text-xl">Entrar</a>
                        </li>
                    @endif
                </div>

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
