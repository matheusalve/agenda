<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '/var/www/html/crud/lib/vendor/autoload.php';
include "/var/www/html/model/db_conn.php";

if (isset($_POST['submit'])) {
   $nome = $_POST['nome'];
   $sobrenome = $_POST['sobrenome'];
   $email = $_POST['email'];
   $senha = $_POST['senha'];
   $genero = $_POST['genero'];

   $sql = "INSERT INTO `crud` (`id`, `nome`, `sobrenome`, `email`, `senha`, `genero`) VALUES (NULL,'$nome','$sobrenome','$email','$senha','$genero')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      $mail = new PHPMailer(true);

      try {
         $mail->isSMTP();
         $mail->SMTPDebug = SMTP::DEBUG_SERVER;
         $mail->CharSet = "UTF-8";
         $mail->Host       = 'smtp.gmail.com';
         $mail->SMTPAuth   = true;
         $mail->Username   = 'matheusalvescarvalho07@gmail.com';
         $mail->Password   = 'dhpnbdoazrnkwyxv';
         $mail->SMTPSecure = 'ssl';
         $mail->Port       = 465;

         $mail->setFrom('matheusalvescarvalho07@gmail.com');
         $mail->addAddress($_POST["email"]);

         $mail->isHTML(true);
         $mail->Subject = 'Confirmar o email';
         $mail->Body    = "Prezado(a) " . $_POST['nome'] . ".<br><br> Agradecemos a sua solicitação de cadastramento em nosso site! <br><br>Para que possamos liberar o seu cadastro em nosso sistema, solicitamos a confirmação do e-mail clicando no link abaixo: <br><br> <a href='http://localhost/crud/confirm_email.php?chave=chave_de_confirmacao'>Clique aqui</a><br><br>Esta mensagem foi enviada a você pela empresa XXX.<br>Você está recebendo porque está cadastrado no banco de dados da empresa XXX. Nenhum e-mail enviado pela empresa XXX tem arquivos anexados ou solicita o preenchimento de senhas e informações cadastrais.<br><br>";

         $mail->AltBody = "Prezado(a) " . $_POST['nome'] . ".\n\n Agradecemos a sua solicitação de cadastramento em nosso site! \n\nPara que possamos liberar o seu cadastro em nosso sistema, solicitamos a confirmação do e-mail clicando no link abaixo: \n\n <a href='http://localhost/crud/confirm_email.php?chave=chave_de_confirmacao'>Clique aqui</a>\n\nEsta mensagem foi enviada a você pela empresa XXX.\nVocê está recebendo porque está cadastrado no banco de dados da empresa XXX. Nenhum e-mail enviado pela empresa XXX tem arquivos anexados ou solicita o preenchimento de senhas e informações cadastrais.\n\n";

         $mail->send();
         echo 'Email enviado com sucesso';

         echo "Novo registro criado com sucesso";
         exit();
      } catch (Exception $e) {
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
   } else {
      echo "Erro ao inserir o registro: " . mysqli_error($conn);
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

   <title>Agenda de contatos</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      LISTA DE CONTATOS
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Adicione um novo usuário</h3>
         <p class="text-muted">Complete os campos para adicionar um novo usuário</p><br>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Nome</label>
                  <input type="text" class="form-control" name="nome" placeholder="Insira seu nome">
               </div>

               <div class="col">
                  <label class="form-label">Sobrenome</label>
                  <input type="text" class="form-control" name="sobrenome" placeholder="Insira seu sobrenome">
               </div>
            </div>

            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Email:</label>
                  <input type="email" class="form-control" name="email" placeholder="Email">
               </div>

               <div class="col">
                  <label class="form-label">Senha:</label>
                  <div class="input-group">
                     <input type="password" class="form-control" name="senha" id="senha" placeholder="Insira sua senha">
                     <button type="button" class="btn btn-outline-secondary" id="mostrarSenhaBtn">
                        <i class="fas fa-eye"></i>
                     </button>
                  </div>
               </div>
            </div>

            <div class="form-group mb-3" style="padding-top: 10px;">
               <label>Gênero:</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="genero" id="masculino" value="masculino">
               <label for="masculino" class="form-input-label">Masculino</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="genero" id="feminino" value="feminino">
               <label for="feminino" class="form-input-label">Feminino</label>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Salvar</button>
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