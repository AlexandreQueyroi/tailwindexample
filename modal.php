<script src="modal.js"></script>
<div id="modal-connection" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Se connecter à la plateforme
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="modal-connection">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Fermer la Modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <form class="space-y-4" id="connection-form" action="action/user.php" method="POST">
                    <div>
                        <label for="pseudo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Identifiant
                        </label>
                        <input type="text" name="pseudo" id="pseudo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Veuillez indiquer votre Identifiant" required />
                        <label for="pseudo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Mot de Passe
                        </label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Mot de Passe" required />
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Connexion à votre compte
                    </button>


                </form>
                <button type="button" data-modal-hide="modal-connection" data-modal-target="modal-createaccount"
                    data-modal-toggle="modal-createaccount" class="text-blue-600 hover:underline">
                    Pas de compte ?
                </button>

            </div>
        </div>
    </div>
</div>
<div id="modal-createaccount" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Créer un compte
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="modal-createaccount">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Fermer la Modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <form action="action/createaccount.php" method="POST" class="space-y-4">
                    <div>
                        <label for="newuser" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Identifiant
                        </label>
                        <input type="text" name="newuser" id="newuser" onblur="checkModalIsValid()"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                            required />
                        <label for="newpass" class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Mot de passe
                        </label>
                        <div class="relative">
                            <input type="password" name="newpass" id="newpass" onblur="checkModalIsValid()"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                                required />
                            <button type="button" onclick="togglePasswordVisibility('newpass','icon-newpass')"
                                class="absolute top-2 right-2 z-10 px-2 py-1 rounded shadow">
                                <span id="icon-newpass" class="iconify" data-icon="tabler:eye-closed"></span>
                            </button>
                        </div>

                        <label for="newpass_confirm"
                            class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Confirmation du Mot de passe
                        </label>
                        <div class="relative">
                            <input type="password" name="newpass_confirm" id="newpass_confirm"
                                onblur="checkModalIsValid()"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                                required />
                            <button type="button"
                                onclick="togglePasswordVisibility('newpass_confirm','icon-newpass-confirm')"
                                class="absolute top-2 right-2 z-10 px-2 py-1 rounded shadow">
                                <span id="icon-newpass-confirm" class="iconify" data-icon="tabler:eye-closed"></span>
                            </button>
                        </div>
                    </div>

                    <button type="submit" id="submitBtn" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                        text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        onclick="if (!checkModalIsValidConfirm(event)) return false;">
                        Créer mon compte
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-newtask" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Ajouter une nouvelle tâche
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="modal-connection">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Fermer la Modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <form method="POST" action="action/addTask.php">
                    <input type="text" name="task" placeholder="Tâche à réaliser" required
                        class="border p-2 w-full rounded" />
                    <div class="flex justify-end mt-4">
                        <button type="button"
                            class="cancel-btn bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 mr-4"
                            data-modal-hide="modal-newtask">
                            Annuler
                        </button>
                        <button type="submit" name="valid"
                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mr-4">
                            Ajouter la Tâche
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-edit-task" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Modifier le nom de la tâche
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="modal-edit-task"></button>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Fermer la Modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <form method="POST" action="action/editTask.php">
                    <input type="hidden" name="task_id" id="edit-task-id" value="<?php echo $task[1]; ?>" />
                    <input type="text" name="task_name" id="edit-task-name" placeholder="Nom de la tâche" required
                        class="border p-2 w-full rounded" />
                    <div class="flex justify-end mt-4"></div>
                    <button type="button"
                        class="cancel-btn bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 mr-4" name="valid"
                        data-modal-hide="modal-edit-task">
                        Annuler
                    </button>
                    <button type="submit" name="valid"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Modifier la Tâche
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>