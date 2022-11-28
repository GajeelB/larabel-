@extends("template.template")
@section("titulo", "Perfil")

@section("section")
    <section>
        <div class="container px-6 py-9 px-20 ">
            <div class="flex justify-center items-center flex-wrap h-1/4 g-6 p-10 mb-10 content-center">
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
                                        <a href="{{route("usuaris.posts.create", Auth::user()->username)}}"
                                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Nou
                                            Post</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="flex flex-row items-center pb-10 py-8">
                        <div class="w-1/2 flex justify-evenly ">
                            <img class="bg-red-400 h-36 mb-3 rounded-full shadow-lg"
                                 src="{{asset("img/user.jpeg")}}"
                                 alt="Bonnie image"/>
                        </div>
                        <div class="w-1/2 flex flex-col">
                            <h5 class="mb-1 text-6xl text-start font-medium text-gray-900 dark:text-white">{{$usuari->username}}</h5>
                            <span
                                class="text-sm text-start text-xl text-gray-700 dark:text-gray-400">{{$usuari->email}}</span>
                            <div class="flex flex-row">
                                <span
                                    class="m-4 bg-white p-2 rounded-full text-sm text-start text-xl text-gray-700 dark:text-gray-400">Posts: {{count($posts)}}</span>

                            </div>
                            <div class="flex justify-start mt-4 space-x-3 md:mt-6">
                                @auth()
                                    @if(Auth::user()->id != $usuari->id )
                                            @if(!$usuari->isFollowed(Auth::user()))

                                                <form action="{{route("user.follow.store",$usuari)}}" method="post">
                                                @csrf
                                                <button
                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-blue-500 border border-blue-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200"
                                                >
                                                    Follow
                                                </button>
                                        </form>
                                    @else
                                            <form action="{{route("user.follow.delete", $usuari)}}" method="post">
                                        @csrf
                                        @method("delete")
                                        <button
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-red-900 bg-red-500 border-2 border-red-900 rounded-lg hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-200 "
                                        >
                                            Unfollow
                                        </button>

                                        </form>
                                    @endif
                                @endif
                                @endauth
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr class="mb-20">
            <div>
                @if(count($posts) >0)
                    <div
                        class="flex flex-wrap justify-center w-full bg-opacity-50 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        @foreach($posts as $post)
                            <a href="{{route("usuaris.posts.show",[$usuari->username, $post->id])}}">
                                <div
                                    class=" m-4 max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">

                                    <img class="rounded-t-lg hover:blur" src="{{asset("uploads/".$post->post_image)}}"
                                         alt=""/>
                                    <div class="p-5">
                                        <h5 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->post_title}}</h5>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
