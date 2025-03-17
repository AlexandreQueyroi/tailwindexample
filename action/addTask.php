<?php
include_once 'bdd.php';
session_start();
if (isset($_SESSION['user'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $task = htmlspecialchars($_POST["task"]);

        $sql = "INSERT INTO tasks (name, id_user, complete) VALUES (?, ?, 0)";
        $stmg = $conn->prepare($sql);
        $stmg->bind_param("si", $task, $_SESSION['id']);
        $stmg->execute();
        $stmg->close();
        header("Location: ../index.php");

    }
}
header("Location: ../index.php");
?>