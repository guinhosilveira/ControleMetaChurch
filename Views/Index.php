<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/Index.css">

    <title>Administração MetaChurch</title>
</head>
<body>
    <nav>

    </nav>

    <div class="centro">
        <img src="../assets/MC.png" alt="">
        <p class="nome">Administração MetaChurch</p>
        <p class="sub">Controle de membresia, agendas e escalas, etc</p>
    
        <form class="buttons" action="" method="POST">
            <?php
            
            session_start();
           
            if (isset($_SESSION['id'])) {

                echo "<button class='butCad' type='submit' formaction='CadastroMembro.php'>Cadastrar Membro</button>";
                
                if (isset($_SESSION['adm'])) {
                    
                    echo "<button class='butCad' type='submit' formaction='Cadastro.php'>Cadastrar Usuário</button>";
                    
                }
                
            } else {
                
                echo "<button class='butLog' type='submit' formaction='Login.php'>Logar</button>";
                
            }
            
            ?>
        </form>
    </div>

    <footer>

    </footer>
</body>
</html>