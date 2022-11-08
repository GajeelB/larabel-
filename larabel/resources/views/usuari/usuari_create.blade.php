
@extends("template.template")
@section("titulo", "Registre de usuari")

@section("section")
<section>
    <div class="container px-6 py-12 h-full">
        <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
            <div class="md:w-8/12 lg:w-5/12 lg:ml-20">
                <form>
                    @csrf
                    <!-- Name input -->
                    <div class="mb-6">
                        <input
                            type="text"
                            class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded"
                            placeholder="Nom"
                        />
                    </div>

                    <!-- Email input -->
                    <div class="mb-6">
                        <input
                            type="text"
                            class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded"
                            placeholder="Email address"
                        />
                    </div>

                    <!-- Password input -->
                    <div class="mb-6">
                        <input
                            type="password"
                            class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded"
                            placeholder="Password"
                        />
                    </div>

                    <div class="mb-6">
                        <input
                            type="password"
                            class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded"
                            placeholder="Password"
                        />
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
