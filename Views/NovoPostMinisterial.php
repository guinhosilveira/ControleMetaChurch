<?php

include '../Back-End/Conecta.php';
include '../Back-End/Protetor.php';

$sql   = "SELECT * FROM tb_ministerios WHERE id_ministerio = '{$_SESSION['ministerio']}'";
$volta = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_all($volta, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&family=DM+Sans:wght@400;700&family=Dancing+Script&family=Dosis:wght@500;700&family=Epilogue:wght@800&family=Inter:wght@400;700&family=JetBrains+Mono:wght@500;700&family=Montserrat:wght@600&family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&family=Palanquin:wght@400;700&family=Poppins:wght@400;700&family=Roboto:wght@400;700&family=Staatliches&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../assets/MC.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/NovoPostMinisterial.css">
    <script src="../JS/NovoPost.js" defer></script>

    <title>Cadastro de Evento</title>
</head>
<body>

    <nav>

        <a href="./Index.php">

            <img 
                src="../assets/MC.png" 
                alt="Logo da igreja"
            />

        </a>

        <ul>
            
            <li><a href="../Views/Home.php">Home</a></li>
            <li><a href="../Views/Agenda.php">Agenda</a></li>
            <li><a href="../Views/Membros.php">Membros</a></li>
            <li><a href="../Views/GruposMinisteriais.php">Ministérios</a></li>
            <li><a href="../Back-End/Logout.php">Logout</a></li>

        </ul>  

    </nav>

    <main>
        
        <form action="../Back-End/NovoPostMinisterial.php" method="POST">

            <fieldset>

                <div class="fieldset-wrapper">

                    <div class="legend-wrapper">

                        <h1>

                            Compartilhe com seu ministério!

                        </h1>

                        <legend>
        
                            O que deseja comunicar?
        
                        </legend>

                    </div>

                    <div class="input-wrapper">

                        <label for="event-name">
                            Nome da Postagem:
                        </label>
                        <input 
                            type="text" 
                            name="nome" 
                            id="event-name" 
                            required
                        />
                
                    </div>

                    <div class="ta-wrapper">

                        <label for="event-textarea">
                            Mensagem:
                        </label>
                        <textarea 
                            name="text" 
                            id="event-textarea"
                            required></textarea>

                    </div>

                    <div class="input-wrapper">

                        <label for="event-video">
                            Link do vídeo:
                        </label>
                        <input 
                            type="text" 
                            name="video" 
                            id="event-video"
                        />

                    </div>
                    
                </div>
                
                <div class="buttons">
    
                    <a href="./Ministerio.php">
                        <button type="button">
                            Cancelar
                        </button>
                    </a>
    
                    <button type="submit" name="enviar">
                        Confirmar postagem
                    </button>                
    
                </div>

            </fieldset>

        </form>

    </main>

</body>
</html>