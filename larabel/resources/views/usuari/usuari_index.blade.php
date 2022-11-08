@extends("template.template")
@section("titulo", "Usuaris")

@section("section")
    <div class="row">
        <div class="col-12 pt-4 ">
            <a href="#"
               class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-1 my-8 mx-8 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Agregar</a>
            <table class="w-full my-5 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th>Nombre</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i< 50 ; $i++){
                ?>
                <tr class="bg-white border-b <?php echo ($i%2 == 0 ) ? "dark:bg-gray-900" : "dark:bg-gray-700";?> dark:border-gray-700">
                    <th scope="col" class="py-3 px-6">
                    </th>
                    <td class="py-4 px-6">
                        <a class="btn btn-warning" href="#">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td class="py-4 px-6">
                        <form action="#" method="post">
                            <button type="submit" class="btn btn-danger">
                                    <span class="material-symbols-outlined">
delete
</span>
                            </button>
                        </form>
                    </td>
                </tr><?php

                } ?>
                </tbody>
            </table>


        </div>
    </div>
@endsection
