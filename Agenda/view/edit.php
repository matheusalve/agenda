<?php

include "/var/www/html/Agenda/model/db_conn.php";

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $genero = $_POST['genero'];

    $sql = "UPDATE `crud` SET `nome`= '$nome', `sobrenome`='$sobrenome', `email`='$email', `genero`='$genero' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: sistema.php?msg=Atualização feita com sucesso");
        exit();
    } else {
        echo "Falha: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap = estrutura já criada no css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Editar Contatos</title>

</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        LISTA DE CONTATOS
    </nav>

    <div class="container" style="padding: 6%;">
        <div class="text-center mb-4" >
            <h3>Edite as informações do usuário</h3>
            <p class="text-muted">Click em update após as alterações</p>
        </div>

        <?php
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $row['nome'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome" value="<?php echo $row['sobrenome'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Senha:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="senha" id="senha" value="<?php echo $row['senha'] ?>">
                            <button type="button" class="btn btn-outline-secondary" id="mostrarSenhaBtn">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3" style="padding-top: 10px;">
                    <label>Gênero:</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="genero" id="masculino" value="masculino" <?php echo ($row["genero"] == 'masculino') ? "checked" : ""; ?>>
                    <label for="masculino" class="form-input-label">Masculino</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="genero" id="feminino" value="feminino" <?php echo ($row["genero"] == 'feminino') ? "checked" : ""; ?>>
                    <label for="feminino" class="form-input-label">Feminino</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="sistema.php" class="btn btn-danger" onclick="return confirm('Tem certeza que não deseja adicionar um novo contato?')">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-0LR9fsES8tUqLDoQlyZZvCmkN92P8SDNbsn3doWeh7kE1RAojYvVEK1Pj6E54Mq9DXDLdc1Fef5hLJoE9NkUdg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const senhaInput = document.getElementById('senha');
        const mostrarSenhaBtn = document.getElementById('mostrarSenhaBtn');

        mostrarSenhaBtn.addEventListener('click', function() {
            if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
                mostrarSenhaBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                senhaInput.type = 'password';
                mostrarSenhaBtn.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    </script>

</body>

</html>