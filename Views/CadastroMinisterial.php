<?php

include '../Back-End/Protetor.php';

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/CadastroMinisterial.css">

    <title>Administração MetaChurch</title>
</head>
<body>
    
    <header>

        <a href="../Views/Agenda.php">Agenda</a>
        <a href="../Views/Membros.php">Membros</a>
        <a href="../Views/GruposMinisteriais.php">Ministérios</a>
    
    </header>

    <main>

        <h1>

            Cadastro de Ministério

        </h1>

        <form action="../Back-End/CadastroMinisterial.php" method="POST">

            <label class="juntos" for="nome">
                Nome Do Ministério:
                <input class="juntos" type="text" name="nomemin" id="nome" placeholder="Informe o nome do ministério" required>
            </label>
    
            <label class="juntos" for="fone">
                Telefone do líder:
                <div class="fones">
                    <input class="juntos" type="tel" name="fone1" id="fone1" placeholder="Informe o DDD" required maxlength="2">
                    <input class="juntos" type="tel" name="fone2" id="fone2" placeholder="Informe o telefone" required maxlength="9">
                </div>
            </label>
    
            <label class="juntos" for="senha">
                Senha de acesso ao ministério:
                <input class="juntos" type="password" name="senha" id="senha" placeholder="Informe a senha de acesso" required>
            </label>
    
            <label class="juntos" for="confsenha">
                Confirmar senha:
                <input class="juntos" type="password" name="confsenha" id="confsenha" placeholder="Confirme a senha" required>
            </label>
                
            <div class="button">
                <button type="submit" class="enviar" name="enviar">Enviar</button>
            </div>
                
        </form>

    </main>
        
    </body>
</html>