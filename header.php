<?php
session_start();
include_once 'bdd.php';
include_once 'modal.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://code.iconify.design/3/3.0.0/iconify.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <link rel="icon" type="image/x-icon" href="img/icon.webp">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="switchmode.js" defer></script>
    <script>
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    primary: {
                        light: "#121212",
                        dark: "#d1d5db",
                    },
                    background: {
                        light: "#d1d5db",
                        dark: "#121212",
                    },
                    background2: {
                        light: "#ffffff",
                        dark: "#0a0a23",
                    },
                },
            },
        },
    };
    document.getElementById('theme-toggle-mobile').addEventListener('click', function() {
        const html = document.documentElement;
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
    </script>
    <title>Tailwind Example - TodoList</title>
</head>

<body class="flex flex-col min-h-screen bg-background2-light dark:bg-background2-dark">
    <header class="flex-grow">
        <nav class="bg-background-light dark:bg-background-dark">
            <div class="flex flex-wrap items-center justify-between mx-auto p-4">
                <?php
                if (isset($_SESSION['user'])) {
                    echo "<a href='./' class='navbar-item'>";
                    echo '<span class="self-center text-2xl font-semibold whitespace-nowrap text-primary-light dark:text-primary-dark">Just Do It - ' . $_SESSION['user'] . '</span>';
                    echo "</a>";
                } else {
                    echo "<a href='./' class='navbar-item'>";
                    echo "<span class='self-center text-2xl font-semibold whitespace-nowrap text-primary-light dark:text-primary-dark'>Just Do It</span>";
                    echo "</a>";
                }
                ?>

                <button id="menu-toggle" class="md:hidden text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12h18M3 6h18M3 18h18"></path>
                    </svg>
                </button>

                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                        <li>
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo '<button data-modal-target="modal-newtask" data-modal-toggle="modal-newtask" class="bg-green-400 hover:bg-green-500 text-white p-2 rounded cursor-pointer">Ajouter une tâche</button>';
                            } else {
                                echo '<button data-modal-target="modal-newtask" data-modal-toggle="modal-newtask" class="bg-red-400 text-white p-2 rounded cursor-not-allowed" disabled>Ajouter une tâche</button>';
                            }
                            ?>
                        </li>
                        <li>
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo "<form action='action/user.php' method='post'>";
                                echo "<input type='hidden' name='disconnect' value='true'>";
                                echo "<button type='submit' name='disconnectBtn' class='bg-gray-500 text-white p-2 rounded hover:bg-red-400 cursor-pointer'>Déconnexion</button>";
                                echo "</form>";
                            } else {
                                echo "<button data-modal-target='modal-connection' data-modal-toggle='modal-connection' class='bg-gray-400 text-white p-2 rounded hover:bg-green-600 cursor-pointer' type='button'>Connexion</button>";
                            }
                            ?>
                        </li>
                        <li>
                            <button id="theme-toggle" type="button" onclick="switchmode()"
                                class="text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 rounded-lg text-sm p-2.5">
                                <span id="theme-toggle-dark-icon"
                                    class="iconify text-background2-light dark:text-background2-dark"
                                    data-icon="tabler:moon"></span>
                                <span id="theme-toggle-light-icon"
                                    class="iconify text-background2-light dark:text-background2-dark"
                                    data-icon="tabler:sun"></span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div id="menu-mobile" class="md:hidden hidden flex flex-col bg-background-light dark:bg-background-dark">
        <ul class="font-medium p-4 space-y-4">
            <li>
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<button data-modal-target="modal-newtask" data-modal-toggle="modal-newtask" class="bg-green-400 hover:bg-green-500 text-white p-2 rounded cursor-pointer">Ajouter une tâche</button>';
                } else {
                    echo '<button data-modal-target="modal-newtask" data-modal-toggle="modal-newtask" class="bg-red-400 text-white p-2 rounded cursor-not-allowed" disabled>Ajouter une tâche</button>';
                }
                ?>
            </li>
            <li>
                <?php
                if (isset($_SESSION['user'])) {
                    echo "<form action='action/user.php' method='post'>";
                    echo "<input type='hidden' name='disconnect' value='true'>";
                    echo "<button type='submit' name='disconnectBtn' class='bg-gray-500 text-white p-2 rounded hover:bg-red-400 cursor-pointer'>Déconnexion</button>";
                    echo "</form>";
                } else {
                    echo "<button data-modal-target='modal-connection' data-modal-toggle='modal-connection' class='bg-gray-400 text-white p-2 rounded hover:bg-green-600 cursor-pointer' type='button'>Connexion</button>";
                }
                ?>
            </li>
            <li>
                <button id="theme-toggle" type="button" onclick="switchmode()"
                    class="text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-500 rounded-lg text-sm p-2.5">
                    <span id="theme-toggle-dark-icon-mobile"
                        class="iconify text-background2-light dark:text-background2-dark"
                        data-icon="tabler:moon"></span>
                    <span id="theme-toggle-light-icon-mobile"
                        class="iconify text-background2-light dark:text-background2-dark" data-icon="tabler:sun"></span>
                </button>
            </li>
        </ul>
    </div>

    <script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const menu = document.getElementById('menu-mobile');
        menu.classList.toggle('hidden');
    });
    </script>


    <container class="flex-grow max-1000px mx-auto">