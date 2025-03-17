<?php
include_once 'bdd.php';
session_start();
if (isset($_GET["checkuser"])) {
    $user = htmlspecialchars($_GET["checkuser"]);
    $stmt = $conn->prepare("SELECT id FROM users WHERE pseudo = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "exist";
    }
    $stmt->close();
    exit;
}
if (!isset($_SESSION['user'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $sql = "SELECT password FROM users WHERE pseudo = ?";
        $stmg = $conn->prepare($sql);
        $stmg->bind_param("s", $pseudo);
        $stmg->execute();
        $result = $stmg->get_result();
        $stmg->close();
        $stockedPassword = $result->fetch_assoc();
        $password = password_verify(htmlspecialchars($_POST['password']), $stockedPassword['password']);
        if ($password) {
            $sql = "SELECT pseudo, id FROM users WHERE pseudo = ? AND password = ?";
            $stmg = $conn->prepare($sql);
            $stmg->bind_param("ss", $pseudo, $stockedPassword['password']);
            $stmg->execute();
            $result = $stmg->get_result();
            $tab = $result->fetch_assoc();
            $stmg->close();
            if ($tab) {
                $_SESSION['user'] = $tab['pseudo'];
                $_SESSION['id'] = $tab['id'];
            }
        }

        header("Location: index.php");
    }
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["disconnect"]) {
            setcookie(session_name(), '', time() - 3600, '/');
            session_unset();
            session_destroy();
            header("Location: index.php");
            exit;
        }
    }
}
header("Location: index.php");
?>