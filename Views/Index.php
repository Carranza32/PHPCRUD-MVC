<?php include('layouts/header.php') ?>

<div class="container mx-auto px-4 sm:px-8 max-w-6xl">
    <h1 class="text-4xl">Usuarios</h1>
    <div class="py-8">
        <div class="flex justify-between">
            <?php
                if (isset($_SESSION["logged_user"])) {
                    if ($_SESSION["logged_user"][0]['role'] == 'Administrador') {
                        echo "
                            <a href='http://localhost/phpcrud/UserController/create' class='px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80'>
                                Nuevo
                            </a>
                        ";
                    }
                }
                
            ?>

            <a href="download_pdf" target="_blank" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-emerald-600 rounded-md hover:bg-emerald-500 focus:outline-none focus:ring focus:ring-emerald-300 focus:ring-opacity-80">
                Descargar Lista
            </a>
        </div>

        <?php
            if (isset($_GET['message'])) {
                echo "
                    <div class='bg-green-200 border-green-600 text-green-600 border-l-4 p-4 mt-3' role='alert'>
                        <p class='font-bold'>Success</p>
                        <p>{$_GET['message']}</p>
                    </div>
                ";
            }

            if (isset($_GET['error_message'])) {
                echo "
                    <div class='bg-red-200 border-red-600 text-red-600 border-l-4 p-4 mt-3' role='alert'>
                        <p class='font-bold'>Error</p>
                        <p>{$_GET['error_message']}</p>
                    </div>
                ";
            }
        ?>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto my-3">
            <div class="inline-block min-w-full drop-shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Nombre
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Email
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Dirección
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Fecha creación
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Rol
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                            foreach ($this->data as $item) {
                                // $activeText = ($item['is_active']) ? 'Activo' : 'Inactivo';
                                $activeClass = (true) ? 'green' : 'red';

                                echo "
                                    <tr>
                                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                            <div class='flex items-center'>
                                                <div class='ml-3'>
                                                    <p class='text-gray-900 whitespace-no-wrap'>
                                                        {$item['name']}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                            <p class='text-gray-900 whitespace-no-wrap'>
                                                {$item['email']}
                                            </p>
                                        </td>
                                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                            <p class='text-gray-900 whitespace-no-wrap'>
                                                {$item['direction']}
                                            </p>
                                        </td>
                                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                            <p class='text-gray-900 whitespace-no-wrap'>
                                                {$item['created_at']}
                                            </p>
                                        </td>
                                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                            <span class='relative inline-block px-3 py-1 font-semibold  leading-tight'>
                                                <span aria-hidden='true' class='absolute inset-0 bg-{$activeClass}-200 opacity-50 rounded-full'>
                                                </span>
                                                <span class='relative'>
                                                    {$item['role']}
                                                </span>
                                            </span>
                                        </td>
                                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                            <a href='edit/{$item['id']}' class='text-indigo-600 hover:text-indigo-900'>
                                                Editar
                                                &nbsp;
                                            </a>
                                            <a href='delete/{$item['id']}' class='text-indigo-600 hover:text-indigo-900'>
                                                Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                ";
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php include('layouts/footer.php') ?>