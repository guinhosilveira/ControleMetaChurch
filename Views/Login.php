<?php

    session_start();
    if(isset($_SESSION['id'])) {
        echo "<script>
                alert('Você já está logado! Faça logout para logar novamente');
                window.location.href = '../Views/CadastroMembro.php';
              </script>";
    }

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;900&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Login.css">
    <title>Administração MetaChurch</title>
</head>
<body>

    <main>

        <section class="formul">
        
            <img src="../assets/MC.png" class="foto" alt="Foto do ícone da Igreja">

            <form class="form" action="../Back-End/Login.php" method="POST">
                    
                <label class="juntos" for="idEmail">
                    Email:
                    <input type="email" name="email" id="idEmail" placeholder="Informe o email">
                </label>
                    
                <label class="juntos" for="idSenha">
                    Senha: 
                    <input type="password" name="senha" id="idSenha" placeholder="Informe a senha">
                </label>
                    
                <div class="buttons">
                    <button class="btLog" type="submit" name="logar">Logar</button>
                    <button class="btCan" type="reset" name="resetar">Resetar</button>
                </div>
    
            </form>
            
        </section>        

    </main>

</body>
</html>