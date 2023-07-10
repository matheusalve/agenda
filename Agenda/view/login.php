<?php
include "/var/www/html/Agenda/model/db_conn.php";
require_once "functions.php";
if (isset($_POST['submit'])) {
    login($conn);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>

</head>
<style>
    .back-link {
        background-color: black;
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 9999;
        padding: 10px;
        background-color: #f1f1f1;
        border: none;
        border-radius: 5px;
        font-family: Arial, sans-serif;
        font-size: 16px;
        text-decoration: none;
        color: #333;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(45deg, #007786, #8CFFB2);
    }

    div {
        background-color: #343838;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 80px;
        border-radius: 15px;
        color: #fff;
    }

    input {
        padding: 15px;
        border: none;
        outline: none;
        font-size: 15px;
    }

    .inputSubmit {
        background-color: dodgerblue;
        border: none;
        padding: 15px;
        width: 100%;
        border-radius: 10px;
        color: white;
        font-size: 15px;
    }

    .inputSubmit:hover {
        background-color: deepskyblue;
        cursor: pointer;
    }

    button {
        background-color: #008c9e;
        border: none;
        padding: 15px;
        width: 100%;
        border-radius: 10px;
        color: snow;
        font-size: 15px;
    }

    button:hover {
        background-color: #04adc4;
    }

    .popup {
        position: fixed;
        top: 15%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #007786;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        box-shadow: linear-gradient(45deg, #007786, #8CFFB2);
        z-index: 9999;
        opacity: 1;
        animation-name: fadeOut;
        animation-duration: 22s;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }

        90% {
            opacity: 0.1;
        }

        100% {
            opacity: 0;
            display: none;
        }
    }
</style>

<body>
    <a class="back-link" href="home.php">Voltar</a>
    <div>
        <h1 style="text-align: center;">Login</h1>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="Insira seu email">
            <br><br>
            <input type="password" name="senha" placeholder="Insira sua senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Entrar">
        </form>
    </div>
</body>

</html>