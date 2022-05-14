<?php include('layouts/header.php') ?>

<h1 class="text-2xl">Productos</h1>
<div class="container mx-auto px-4 sm:px-8 max-w-3xl">
    <div class="py-8">
        <a href="http://localhost/phpcrud/ProductosController/create" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            Nuevo
        </a>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full drop-shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Nombre
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Stock
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Categoría
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Estado
                            </th>
                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                            foreach ($this->data as $item) {
                                $activeText = ($item['is_active']) ? 'Activo' : 'Inactivo';
                                $activeClass = ($item['is_active']) ? 'green' : 'red';

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
                                                {$item['stock']}
                                            </p>
                                        </td>
                                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                            <p class='text-gray-900 whitespace-no-wrap'>
                                                {$item['category']}
                                            </p>
                                        </td>
                                        <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                            <span class='relative inline-block px-3 py-1 font-semibold  leading-tight'>
                                                <span aria-hidden='true' class='absolute inset-0 bg-{$activeClass}-200 opacity-50 rounded-full'>
                                                </span>
                                                <span class='relative'>
                                                    {$activeText}
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