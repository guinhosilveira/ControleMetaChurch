<?php

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700&family=Dosis:wght@500;700&family=Inter:wght@400;700&family=JetBrains+Mono:wght@500;700&family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Cadastro.css">
    
    <title>Administração MetaChurch</title>
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
        
        <form action="../Back-End/CadastroUsuario.php" method="POST">

            <fieldset>

                <div class="fieldset-wrapper">
                    
                    <div class="legend-wrapper">

                        <legend>Cadastro de Usuário</legend>

                    </div>

                    <div class="input-wrapper">

                        <label 
                            for="event-name">
                            Nome de Usuário:
                            <span>(nome para uso na plataforma)</span>
                        </label>
                        <input 
                            type="text" 
                            name="nome" 
                            id="event-name" 
                            required    
                        />

                    </div>
                        
                    <div class="input-wrapper">

                        <label 
                            for="event-email">
                            Email do membro:
                            <span>(email precisa estar cadastrado como membro)</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="event-email" 
                            required
                        />

                    </div>

                    <div class="checkbox-wrapper">

                        <input 
                            type="checkbox" 
                            name="admin"
                            id="event-admin"
                        />
                        <label 
                            for="event-admin">
                            Usuário administrador
                        </label>

                    </div>
                    
                </div>
                
                <div class="buttons">
                    <button type="submit" name="enviar">Cadastrar</button>
                    <a href="Index.php"><button type="button">Cancelar</button></a>
                </div>

            </fieldset> 
                
        </form>

    </main>

</body>
</html>