@extends("template.template")
@section("titulo", "Perfil")

@section("section")
    <section>
        <div class="container px-6 py-9 px-20 ">
            <div class="flex justify-center items-center flex-wrap h-1/2 g-6 p-10 content-center">
                <div
                    class="w-full bg-opacity-50 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    @if(Auth::check())
                    <div class="flex justify-end px-4 pt-4">
                        <button id="dropdownButton" data-dropdown-toggle="dropdown"
                                class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                                type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="black" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown"
                             class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                            <ul class="py-1" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                        Data</a>
                                </li>
                                <li>
                                    <a href="#"
                                       class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="flex flex-row items-center pb-10 py-8">
                        <div class="w-1/2 flex justify-evenly ">
                            <img class="bg-red-400 h-64 mb-3 rounded-full shadow-lg"
                                 src="{{asset("img/user.jpeg")}}"
                                 alt="Bonnie image"/>
                        </div>
                        <div class="w-1/2 flex flex-col">
                            <h5 class="mb-1 text-6xl text-start font-medium text-gray-900 dark:text-white">{{$usuari->username}}</h5>
                            <span class="text-sm text-start text-xl text-gray-700 dark:text-gray-400">{{$usuari->name}}</span>
                            <span class="text-sm text-start text-xl text-gray-700 dark:text-gray-400">{{$usuari->email}}</span>
                            <span class="text-sm text-start text-xl text-gray-700 dark:text-gray-400">Tel:</span>
                            <span class="text-sm text-start text-xl text-gray-700 dark:text-gray-400">Direcció:</span>
                            <div class="flex justify-start mt-4 space-x-3 md:mt-6">
                                @if(Auth::check())
                                    @if(Auth::user()->id == $usuari->id )
                                        <a href="{{route("usuaris.edit", [$usuari->username])}}"
                                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            edit
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
