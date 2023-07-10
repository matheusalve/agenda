<?php
include "/var/www/html/Agenda/model/db_conn.php";

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO `usuarios` (`id`, `nome`, `senha`, `email`, `telefone`, `genero`, `data_nasc`, `cidade`, `estado`) VALUES (NULL, '$nome', '$senha', '$email', '$telefone', '$genero', '$data_nasc', '$cidade', '$estado')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: login.php?msg=Por favor, insira seu email e senha para acessar nossa página");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        #mostrarSenhaBtn {
            background-image: linear-gradient(to right, rgb(0, 151, 197), rgb(90, 20, 220));
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            font-size: 14px;
        }

        #mostrarSenhaBtn:hover {
            background-image: linear-gradient(to right, #027b8b, #00b4cc);
            cursor: pointer;
        }

        .back-link {
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

        .box {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #343838;
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }

        fieldset {
            border: 3px solid #007786;
        }

        legend {
            border: 1px solid #007786;
            padding: 10px;
            text-align: center;
            background-color: #007786;
            border-radius: 8px;
        }

        .inputBox {
            position: relative;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }

        .labelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus~.labelInput,
        .inputUser:valid~.labelInput {
            top: -20px;
            font-size: 12px;
            color: #008c9e;
        }

        #data_nascimento {
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }

        #submit {
            background-image: linear-gradient(to right, rgb(0, 151, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }

        #submit:hover {
            background-image: linear-gradient(to right, #027b8b, #00b4cc);
        }
    </style>
</head>

<body>
    <a class="back-link" href="home.php">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Digite sua senha</label><br>
                    <button type="button" id="mostrarSenhaBtn" onclick="togglePasswordVisibility()">Mostrar Senha</button>

                </div>
                <br><br>
                <div class="<?php include "/var/www/html/model/db_conn.php";?>inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Cadastrar">
            </fieldset>
        </form>
    </div>
    <script>
        function togglePasswordVisibility() {
            var senhaInput = document.getElementById("senha");
            if (senhaInput.type === "password") {
                senhaInput.type = "text";
                document.getElementById("mostrarSenhaBtn").textContent = "Ocultar Senha";
            } else {
                senhaInput.type = "password";
                document.getElementById("mostrarSenhaBtn").textContent = "Mostrar Senha";
            }
        }
    </script>
</body>

</html>