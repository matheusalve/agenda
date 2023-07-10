<?php
include "../model/db_conn.php";

$conn = mysqli_connect ($servername, $username, $password, $dbname);

function login($conn)
{
    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $senha = $_POST['senha'];

        $query = "SELECT * FROM `usuarios` WHERE `email` = '$email' AND `senha` = '$senha' ";
        $executar = mysqli_query($conn, $query);
        $return = mysqli_fetch_assoc($executar);

        if (!empty($return['email'])) {
            session_start();
            $_SESSION['nome'] = $return['nome'];
            $_SESSION['id'] = $return['id'];
            $_SESSION['ativa'] = TRUE;

            header("Location: sistema.php");    
            exit();
        } else {
            echo "Usuário ou senha não encontrado!";
        }
    }
}

function logout()
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: sistema.php");
    exit();
}
?>
