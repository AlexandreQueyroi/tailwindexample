<?php
include_once 'bdd.php';
session_start();
if (isset($_SESSION['user'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['remove']) && !empty($_POST['id'])) {
            $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

            $sql = "DELETE FROM tasks WHERE id = ? and id_user = ?";
            $stmg = $conn->prepare($sql);
            $stmg->bind_param("ii", $id, $_SESSION['id']);
            $stmg->execute();
            $stmg->close();
        }
        header("Location: index.php");

    }
}
header("Location: index.php");
?>