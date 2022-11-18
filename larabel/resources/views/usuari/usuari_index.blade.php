@extends("template.template")
@section("titulo", "Usuaris")

@section("section")
    <section>
        <div class="container px-6 py-9 px-20 ">
            <div
                class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800 p-10 rounded-3xl border-gray-700 bg-gray-500 border-4">
                <div class="w-full h-96">
                    <a href="{{route("usuari.create")}}"
                       class="sticky bg-blue-500 hover:bg-blue-400 text-white font-bold py-1 my-8 mx-8 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Agregar</a>
                    <div class="rounded-xl border-t-white overflow-auto h-5/6 mt-4">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-700 text-gray-400 text-center">
                            <tr class="">
                                <th class=" py-3 px-6">Nombre</th>
                                <th class="py-3 px-6">Editar</th>
                                <th class="py-3 px-6">Eliminar</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                                $i = 0;
                                ?>
                            @foreach($users as $user)

                            <tr class="bg-white <?php echo ($i%2 == 0 ) ? "dark:bg-gray-900" : "dark:bg-gray-700";?>">
                                <th scope="col" class="py-3 px-6">
                                    {{$user->name}}
                                </th>
                                <td class="py-4 px-6">
                                    <a class="btn btn-warning" href="{{route("usuari.edit",$user->id)}}">
                                        <span class="material-symbols-outlined">edit_square</span>
                                    </a>
                                </td>
                                <td class="py-4 px-6">
                                    <form action="{{route("usuari.destroy", [$user])}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                                <?php
                                $i ++;
                                ?>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

