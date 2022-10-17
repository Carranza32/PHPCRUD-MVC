<?php include('layouts/header.php') ?>

<div class="container mx-auto px-4 sm:px-8 max-w-4xl">
    <div class="flex items-center py-4 overflow-y-auto whitespace-nowrap">
        <a href="http://localhost/phpcrud/UserController/Index" class="text-gray-600 dark:text-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
        </a>

        <span class="mx-5 text-gray-500 dark:text-gray-300">
            /
        </span>

        <a href="#!" class="text-blue-600 dark:text-blue-400 hover:underline">
            Nuevo usuario
        </a>
    </div>
</div>

<section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Crear usuario</h2>

    <?php 
        if (isset($_GET['message'])) {
            echo "
                <div class='bg-green-200 border-green-600 text-green-600 border-l-4 p-4' role='alert'>
                    <p class='font-bold'>Success</p>
                    <p>{$_GET['message']}</p>
                </div>
            ";
        }

        if (isset($_GET['error_message'])) {
            echo "
                <div class='bg-red-200 border-red-600 text-red-600 border-l-4 p-4' role='alert'>
                    <p class='font-bold'>Error</p>
                    <p>{$_GET['error_message']}</p>
                </div>
            ";
        }
    ?>
    
    <form action="http://localhost/phpcrud/UserController/store" method="POST">
        <div class="grid grid-cols-1 gap-6 mt-4">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="name">Nombre de usuario <span class="text-red-400">*</span> </label>
                <input id="name" name="name" type="text" require class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="email">Email <span class="text-red-400">*</span></label>
                <input id="email" name="email" type="email" require class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200"  for="role">Rol</label>
                <select id="role" name="role" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    <option value='Administrador' selected>Administrador</option>
                    <option value='Usuario'>Usuario</option>
                </select>
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="address">Dirección</label>
                <textarea id="address" name="address" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"></textarea>
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" require for="password">Contraseña <span class="text-red-400">*</span></label>
                <input id="password" name="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" require for="password_confirm">Repetir Contraseña <span class="text-red-400">*</span></label>
                <input id="password_confirm" name="password_confirm" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" required>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Guardar</button>
        </div>
    </form>
</section>

<?php include('layouts/footer.php') ?>