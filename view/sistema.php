<?php
include "/var/www/html/model/db_conn.php";
include "/var/www/html/model/db_cadas__conn.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .btn-exit {
            position: fixed;
            top: 40px;
            right: 20px;    
        }

        h1 {
            text-align: center;
            background-image: linear-gradient(45deg, #007786, #8CFFB2);
            padding: 2%;
            top: 0;
            z-index: 999;
        }

        .table-container {
            padding-top: 30px;
            max-height: 600px;
            overflow-y: auto;
        }

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: lightgreen;
            z-index: 9999;
            opacity: 1;
            animation-name: fadeOut;
            animation-duration: 4s;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
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

    <title>Agenda de contatos</title>
</head>

<body>
    <h1>LISTA DE CONTATOS</h1>

    <a href="sair.php" class="btn btn-danger btn-exit">Sair</a>

    <div class="container">
        <?php
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">    ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
        <br><br><br>
        <a href="add_new.php" class="btn btn-dark mb-3">Adicionar</a>

        <div class="table-container">
            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOME</th>
                        <th scope="col">SOBRENOME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">GENERO</th>
                        <th scope="col">AÇÃO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `crud`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["nome"] ?></td>
                            <td><?php echo $row["sobrenome"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["genero"] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5" onclick="return confirm('Tem certeza que deseja excluir esse contato?')"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pop-up -->
    <?php if (isset($_GET['msg'])) : ?>
        <div class="popup">
            <div class="popup-content">
                <h1>Pop-up de Boas-Vindas</h1>
                <p><?php echo $_GET['msg']; ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
