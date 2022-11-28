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
                                    <div class="p-5 flex flex-row justify-between">
                                        <h5 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->post_title}}</h5>
                                        <form action="{{route("posts.likes", $post->id)}}" method="post">
                                            @csrf
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="{{$post->checkLike(Auth::user())? "red" : "black" }}" height="48" width="48">
                                                    <path
                                                        d="m24 41.95-2.05-1.85q-5.3-4.85-8.75-8.375-3.45-3.525-5.5-6.3T4.825 20.4Q4 18.15 4 15.85q0-4.5 3.025-7.525Q10.05 5.3 14.5 5.3q2.85 0 5.275 1.35Q22.2 8 24 10.55q2.1-2.7 4.45-3.975T33.5 5.3q4.45 0 7.475 3.025Q44 11.35 44 15.85q0 2.3-.825 4.55T40.3 25.425q-2.05 2.775-5.5 6.3T26.05 40.1ZM24 38q5.05-4.65 8.325-7.975 3.275-3.325 5.2-5.825 1.925-2.5 2.7-4.45.775-1.95.775-3.9 0-3.3-2.1-5.425T33.5 8.3q-2.55 0-4.75 1.575T25.2 14.3h-2.45q-1.3-2.8-3.5-4.4-2.2-1.6-4.75-1.6-3.3 0-5.4 2.125Q7 12.55 7 15.85q0 1.95.775 3.925.775 1.975 2.7 4.5Q12.4 26.8 15.7 30.1 19 33.4 24 38Zm0-14.85Z"/>
                                                </svg>
                                            </button>
                                        </form>
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
