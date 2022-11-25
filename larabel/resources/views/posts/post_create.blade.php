
@extends("template.template")
@section("titulo", "Nou Post")

@section("section")
    <section>
        <div class="py-9 my-3 flex justify-center">
            <div class="flex justify-center items-center flex-wrap h-full w-8/12 text-gray-800 p-10 rounded-3xl border-gray-700 bg-gray-500 border-4">
                <div class="w-full flex justify-center flex-wrap">
                    <h1 class="font-medium leading-tight text-5xl mt-0 mb-2 text-gray-300 w-full text-center mb-10">Nou Post</h1>
                    <div class="flex flex-row w-11/12 justify-evenly">
                        <form action="{{route("usuaris.posts.store", Auth::user()->username)}}" class="w-2/5" method="post">
                            @csrf
                            <!-- Username input -->
                            <div class="mb-6">
                                <input
                                    type="text"
                                    class="form-control block w-full px-4 py-2 text-xl font-normal @error("titol") border-red-500 border-3 @enderror text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded"
                                    placeholder="Titol"
                                    value="{{old("titol")}}"
                                    name="post_title"
                                />
                                @error("titol")
                                <p class="error-p">{{$message}}</p>
                                @enderror
                            </div>
                            <!-- Name input -->
                            <div class="mb-6">
                            <textarea
                                class="form-control block w-full px-4 py-2 text-xl font-normal @error("com") border-red-500 border-3 @enderror text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded"
                                placeholder="Contingut"
                                name="post_content"
                                value="{{old("com")}}"
                            ></textarea>
                                @error("com")
                                <p class="error-p">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <input
                                    type="hidden"
                                    name="post_image"
                                    id="name_imge"
                                />

                            </div>

                            <!-- Submit button -->
                            <div class="flex flex-row justify-evenly">
                                <button
                                    type="submit"
                                    class="w-2/5 rounded-xl  inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg active:bg-blue-800 active:shadow-lg w-full"
                                    data-mdb-ripple="true"
                                    data-mdb-ripple-color="light"
                                >
                                    Registrar
                                </button>
                                <button
                                    type="submit"
                                    class="w-2/5 rounded-xl inline-block px-7 py-3 bg-red-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg active:bg-blue-800 active:shadow-lg w-full"
                                    data-mdb-ripple="true"
                                    data-mdb-ripple-color="light"
                                >
                                    clear
                                </button>
                            </div>
                        </form>
                        <form action="{{route("images.store")}}" method="post" enctype="multipart/form-data" id="drop" class="w-2/5 bg-white dropzone border-dashed border-2 rounded-3xl">
                            @csrf
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
