<?php

include '../Back-End/Conecta.php';
include '../Back-End/Protetor.php';

$sql   = "SELECT * FROM tb_ministerios";
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
    <link rel="stylesheet" href="../CSS/CadastroOcasion.css">

    <title>Cadastro de Evento</title>
</head>
<body>

    <nav>

        <ul>
            <li><a href="../Views/Agenda.php">Agenda</a></li>
            <li><a href="../Views/Membros.php">Membros</a></li>
            <li><a href="../Views/GruposMinisteriais.php">Ministérios</a></li>
        </ul>
    
    </nav>

    <main>
        
        <form action="../Back-End/CadastroOcasion.php" method="POST">

            <fieldset>

                <div class="fieldset-wrapper">

                    <div class="legend-wrapper">

                        <h1>

                            Cadastro de evento

                        </h1>

                        <legend>
        
                            Informe os detalhes do evento!
        
                        </legend>

                    </div>

                    <div class="input-wrapper">

                        <label 
                            for="nome">
                            Nome do Evento:
                        </label>
                        <input 
                            type="text" 
                            name="nome" 
                            id="nome" 
                            required
                        />

                    </div>

                    <div class="input-wrapper">

                        <label for="nome">
                            Nome do Evento:
                        </label>
                        <input 
                            type="text" 
                            name="nome" 
                            id="nome" 
                            required
                        />
                
                    </div>

                    <div class="input-wrapper">

                        <label for="beggin">
                            Início do Evento:
                        </label>
                        <input 
                            type="datetime-local" 
                            name="beggin" 
                            id="beggin"
                            required
                        />

                    </div>

                    <div class="input-wrapper">

                        <label for="end">
                            Fim do Evento:
                        </label>
                        <input 
                            type="datetime-local" 
                            name="end" 
                            id="end"
                            required
                        />

                    </div>

                    <div class="select-wrapper">

                        <label 
                            for="select">
                            Ministério:
                        </label>
                        <select name="ministerio" id="select">
        
                            <?php
        
                                foreach ($dados as $key => $value) {
        
                                    echo '<option value="'.$value['id_ministerio'].'">'.$value['nm_ministerio'].'</option>';
        
                                }
        
                            ?>
                            
                        </select>
        
                    </div>
                    
                </div>
                
                <div class="buttons">
    
                    <a href="Index.php">
                        <button type="button">
                            Cancelar
                        </button>
                    </a>
    
                    <button type="submit" name="enviar">
                        Confirmar Evento
                    </button>                
    
                </div>

            </fieldset>

        </form>

    </main>

    <footer>



    </footer>

</body>
</html>