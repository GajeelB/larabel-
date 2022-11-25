@extends("template.template")
@section("titulo", "Perfil")

@section("section")
    <section>
        <div class="container px-6 py-9 px-20 ">
            <div>
                @if(count($posts) >0)
                    <div
                        class="flex flex-wrap justify-center w-full bg-opacity-50 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        @foreach($posts as $post)
                            <a href="{{route("usuaris.posts.show",[$post->user->username, $post->id])}}">
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
