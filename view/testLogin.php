<?php
include_once('/var/www/html/model/db_cadas__conn.php');
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) < 1) {
        unset($_POST['email']);
        unset($_POST['senha']);
        header('Location: login.php');
    } else {
        $_POST['email'] = $email;
        $_POST['senha'] = $senha;
        header('Location: sistema.php');
    }
} else {
    header('Location: login.php');
}
