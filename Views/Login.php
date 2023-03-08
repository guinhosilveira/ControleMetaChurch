<?php

    session_start();
    if(isset($_SESSION['id'])) {
        echo "<script>
                alert('Você já está logado! Faça logout para logar novamente');
                window.location.href = '../Views/Index.php';
              </script>";
    }

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700&family=DM+Sans:wght@400;700&family=Dancing+Script&family=Dosis:wght@500;700&family=Epilogue:wght@800&family=Inter:wght@400;700&family=JetBrains+Mono:wght@500;700&family=Montserrat:wght@600&family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&family=Palanquin:wght@400;700&family=Poppins:wght@400;700&family=Roboto:wght@400;700&family=Staatliches&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../assets/MC.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/Login.css">

    <title>Administração MetaChurch</title>
</head>
<body>

    <main>

        <form action="../Back-End/Login.php" method="POST">
            
            <fieldset>

                <div class="fieldset-wrapper">
                    
                    <img src="../assets/MC.png" class="foto" alt="Foto do ícone da Igreja">
                       
                    <div class="input-wrapper">

                        <label 
                            for="idEmail">
                            Email:
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="idEmail" 
                            required
                        />

                    </div>
                    
                    <div class="input-wrapper">

                        <label 
                            for="idSenha">
                            Senha: 
                        </label>
                        <input 
                            type="password" 
                            name="senha" 
                            id="idSenha" 
                            required
                        />

                    </div>
                            
                    <div class="buttons">
                        <button class="btLog" type="submit" name="logar">Logar</button>
                        <button class="btCan" type="reset" name="resetar">Resetar</button>
                    </div>

                </div>

            </fieldset>
    
        </form>        

    </main>

</body>
</html>