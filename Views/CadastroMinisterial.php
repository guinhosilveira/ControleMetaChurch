<?php

include '../Back-End/Protetor.php';

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
    <link rel="stylesheet" href="../CSS/CadastroMinisterial.css">

    <title>Administração MetaChurch</title>
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
        
        <form action="../Back-End/CadastroMinisterial.php" method="POST">
            
            <fieldset>
                
                <div class="fieldset-wrapper">

                    <div class="title-wrapper">
            
                        <h1>
                
                            Cadastro de Ministério
                
                        </h1>
            
                    </div>

                    <div class="input-wrapper">
        
                        <label 
                            for="event-name">
                            Nome Do Ministério:
                        </label>
                        <input 
                            type="text" 
                            name="nomemin" 
                            id="event-name" 
                            required
                        />
        
                    </div>
            
                    <div class="input-wrapper">
        
                        <label 
                            for="event-fone1">
                            Telefone do líder:
                        </label>
                        <div class="fones-wrapper">
                            <input 
                                type="tel" 
                                name="fone1" 
                                id="event-fone1"
                                class="fone1" 
                                maxlength="2"
                                required
                            />
                            <input  
                                type="tel" 
                                name="fone2" 
                                class="fone2" 
                                maxlength="9" 
                                required 
                            />
                        </div>
        
                    </div>
        
                    <div class="input-wrapper">
        
                        <label 
                            for="event-password">
                            Senha de acesso ao ministério:
                        </label>
                        <input 
                            type="password" 
                            name="senha" 
                            id="event-password" 
                            required
                        />
        
                    </div>
        
                    <div class="input-wrapper">
        
                        <label 
                            for="event-confpw">
                            Confirmar senha:
                        </label>
                        <input 
                            type="password" 
                            name="confsenha" 
                            id="event-confpw" 
                            required
                        />
        
                    </div>

                    <div class="button">
                        <button type="submit" class="enviar" name="enviar">Enviar</button>
                    </div>

                </div>
                
            </fieldset>   
                
        </form>

    </main>
        
</body>
</html>