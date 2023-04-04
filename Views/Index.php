<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700&family=DM+Sans:wght@400;700&family=Dancing+Script&family=Dosis:wght@500;700&family=Epilogue:wght@800&family=Inter:wght@400;700&family=JetBrains+Mono:wght@500;700&family=Montserrat:wght@600&family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&family=Palanquin:wght@400;700&family=Poppins:wght@400;700&family=Roboto:wght@400;700&family=Staatliches&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../assets/MC.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/Index.css">

    <title>Administração MetaChurch</title>
</head>
<body>

    <div class="page">

        <img 
            src="../assets/MC.png" 
            alt="Logo da igreja MetaChurch"
        />

        <h1>
            Administração MetaChurch
        </h1>
        <p>
            Controle de membresia, agendas e escalas, etc
        </p>
    
        <form class="buttons" action="" method="POST">
            <?php
            
            session_start();
           
            if (isset($_SESSION['nm_user'])) {

                echo '<button type="submit" formaction="Home.php">Página Inicial</button>';
                
                if (isset($_SESSION['adm']) || isset($_SESSION['dir'])) {
                    
                    echo '<button type="submit" formaction="CadastroMembro.php">Cadastrar Membro</button>';
                    echo '<button type="submit" formaction="Cadastro.php">Cadastrar Usuário</button>';
                    
                }
                
            } else {
                
                echo '<button type="submit" formaction="Login.php">Logar</button>';
                
            }
            
            ?>

        </form>

    </div>

</body>
</html>