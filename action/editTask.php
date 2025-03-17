<?php
include_once 'bdd.php';
session_start();
if (isset($_SESSION['user'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['edit']) && !empty($_POST['id'])) {
            $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

            $sql = "UPDATE tasks SET name = ? WHERE id = ? and id_user = ?";
            $stmg = $conn->prepare($sql);
            $stmg->bind_param("sii", $_POST['task'], $id, $_SESSION['id']);
            $stmg->execute();
            $stmg->close();
        }
        header("Location: index.php");

    }
}
header("Location: index.php");
?>