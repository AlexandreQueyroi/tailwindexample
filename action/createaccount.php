<?php
include_once 'bdd.php';
session_start();
// var_dump($_POST);
if (isset($_POST['newuser']) && isset($_POST['newpass']) && isset($_POST['newpass_confirm'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = password_hash(htmlspecialchars($_POST['newpass']), CRYPT_SHA256);
        $pseudo = htmlspecialchars($_POST['newuser']);
        $sql = "INSERT INTO users (pseudo, password) VALUES (?, ?)";
        $stmg = $conn->prepare($sql);
        $stmg->bind_param("ss", $pseudo, $password);
        $stmg->execute();
        $stmg->close();
        $loginData = array(
            'username' => $pseudo,
            'password' => htmlspecialchars($_POST['newpass'])
        );

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($loginData),
            ),
        );

        $context = stream_context_create($options);
        $result = file_get_contents('/var/www/htmlaction/action/user.php', false, $context);

        if ($result === FALSE) {
            echo "error";
        }
        header("Location: index.php");

    }
}
header("Location: index.php");
?>