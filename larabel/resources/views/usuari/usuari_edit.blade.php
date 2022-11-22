<?php
?>
@extends("template.template")
@section("titulo", "Editar Usuari")

@section("section")
<section>
    <div class="container px-6 py-9 px-20 my-3 flex justify-center">
        <div class="flex justify-center items-center flex-wrap h-full w-3/5 text-gray-800 p-10 rounded-3xl border-gray-700 bg-gray-500 border-4">
            <div class="w-full flex justify-center flex-wrap">
                <h1 class="font-medium leading-tight text-5xl mt-0 mb-2 text-gray-300 w-full text-center mb-10">Editar</h1>
                <form action="{{route("usuaris.update", $user->id )}}" class="w-full" method="post">
                    @method("put")
                    @csrf
                    <!-- Username input -->
                    <div class="mb-6">
                        <input
                            type="text"
                            class="form-control block w-full px-4 py-2 text-xl font-normal @error("username") border-red-500 border-3 @enderror text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded"
                            placeholder="Nom"
                            value="{{$user->username}}"
                            name="username"
                        />
                        @error("username")
                            <p class="error-p">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Name input -->
                    <div class="mb-6">
                        <input
                            type="text"
                            class="form-control block w-full px-4 py-2 text-xl font-normal @error("name") border-red-500 border-3 @enderror text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded"
                            placeholder="Nom"
                            name="name"
                            value="{{$user->name}}"
                        />
                        @error("name")
                        <p class="error-p">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Email input -->
                    <div class="mb-6">
                        <input
                            type="text"
                            class="@error("email") border-red-500 border-3 @enderror form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded"
                            placeholder="Email address"
                            value="{{$user->email}}"
                            name="email"
                        />
                        @error("email")
                        <p class="error-p">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="mb-6">
                        <input
                            type="password"
                            class="@error("password") border-red-500 border-3 @enderror form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded"
                            placeholder="Password"
                            name="password"
                        />
                        @error("password")
                        <p class="error-p">{{$message}}</p>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <button
                        type="submit"
                        class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg active:bg-blue-800 active:shadow-lg w-full"
                        data-mdb-ripple="true"
                        data-mdb-ripple-color="light"
                    >
                        Registrar
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
