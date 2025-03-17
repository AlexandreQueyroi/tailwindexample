<?php
include_once 'header.php';
?>

<?php

if (isset($_SESSION['user'])) {
    include_once 'action/bdd.php';
    $sql = "SELECT name, id, complete FROM tasks WHERE id_user = ?";
    $stmg = $conn->prepare($sql);
    $stmg->bind_param("i", $_SESSION['id']);
    $stmg->execute();
    $result = $stmg->get_result();
    $stmg->close();
    $tasks = $result->fetch_all();
    if ($result->num_rows > 0) {
        echo '<div class="flex justify-between font-bold mb-2 px-4 text-primary-light dark:text-primary-dark">';
        echo '<span class="text-left">Tâche</span>';
        echo '<span class="text-center flex-grow">État</span>';
        echo '<span class="text-right">Actions</span>';
        echo '</div>';
        echo "<ul class='list-disc list-inside'>";
        foreach ($tasks as $task) {
            echo "<li class='flex justify-between items-center border-2 border-gray-400 rounded-lg p-6 mb-4 shadow-lg bg-gray-50 bg-gray-200 dark:bg-gray-900 text-primary-light dark:text-primary-dark'>";
            echo "<span class='w-1/3 text-left'>" . $task[0] . "</span>";
            echo "<span class='w-1/3 text-center'>" . ($task[2] ? 'Terminée' : 'En cours') . "</span>";
            echo "<div class='w-1/3 flex justify-end flex-wrap'>";
            if ($task[2] == 0) {
                echo "<form action='action/completeTask.php' method='post' class='mb-2 mr-2'>";
                echo "<input type='hidden' name='id' value='" . $task[1] . "'>";
                echo "<button type='submit' name='complete' class='bg-green-400 iconify hover:bg-green-500 text-white p-2 rounded cursor-pointer'><span class='iconify' data-icon='tabler:check'></span></button>";
                echo "</form>";
                echo "<div class='mb-2 mr-2'>";
                echo "<input type='hidden' id='task-id' value='" . $task[1] . "'>";
                echo "<button disabled data-modal-target='modal-edit-task' data-modal-toggle='modal-edit-task' name='edit' class='bg-blue-400 hover:bg-blue-500 text-white p-2 rounded cursor-not-allowed'><span class='iconify' data-icon='tabler:pencil'></span></button>";
                echo "</div>";
            }
            echo "<form action='action/removeTask.php' method='post' class='mb-2 mr-2'>";
            echo "<input type='hidden' name='id' value='" . $task[1] . "'>";
            echo "<button type='submit' name='remove' class='bg-red-400 hover:bg-red-500 text-white p-2 rounded cursor-pointer'><span class='iconify' data-icon='tabler:trash'></span></button>";
            echo "</form>";
            echo "</div>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<h3 class='text-primary-light dark:text-primary-dark'>Aucune tâche à afficher</h3>";
    }
} else {
    echo "<h3 class='text-primary-light dark:text-primary-dark'>Vous devez être connecté pour voir vos tâches</h3>";
}

?>

<?php

include_once 'footer.php';