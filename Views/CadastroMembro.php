<?php

include '../Back-End/Protetor.php';

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/CadastroMembro.css">
    <script src="../JS/CadastroMembro.js"></script>

    <title>Administração MetaChurch</title>
</head>
<body>
    
    <header>

        <a href="../Views/Agenda.php">Agenda</a>
        <a href="../Views/Membros.php">Membros</a>
        <a href="../Views/GruposMinisteriais.php">Ministérios</a>
    
    </header>

    <main>
        
        <section class="lado1">

            <h1>

                Informações Obrigatórias

            </h1>

            <form action="../Back-End/CadastroMembro.php" method="POST">

                <label class="juntos" for="nome">
                    Nome:
                    <input class="juntos" type="text" name="nome" id="nome" placeholder="Informe o nome" required>
                </label>
    
                <label class="juntos" for="fone">
                    Telefone:
                    <div class="fones">
                        <input class="juntos" type="tel" name="fone1" id="fone1" placeholder="Informe o DDD" required maxlength="2">
                        <input class="juntos" type="tel" name="fone2" id="fone2" placeholder="Informe o telefone" required maxlength="9">
                    </div>
                </label>
    
                <label class="juntos" for="senha">
                    Senha:
                    <input class="juntos" type="password" name="senha" id="senha" placeholder="Informe a Senha" required>
                </label>
    
                <label class="juntos" for="confsenha">
                    Confirmar senha:
                    <input class="juntos" type="password" name="confsenha" id="confsenha" placeholder="Confirme a Senha" required>
                </label>

                <div class="button">
                    <button type="button" onclick="Mudarestado()" class="enviar">Enviar</button>
                </div>

        </section>

        <section class="lado2" hidden>

            <h1>

                Informações Opcionais

            </h1>

            <div class="fakeform">

                <label class="juntos" for="data">
                    Data de Nascimento:
                    <input class="juntos" type="date" name="data" id="data">
                </label>
                    
                <label class="juntos" for="ano">
                    Ano de Ingresso:
                    <input class="juntos" type="tel" name="ano" id="ano" placeholder="Informe o ano de ingresso na igreja" maxlength="4">
                </label>

                <label class="juntos" for="email">
                    Email:
                    <input class="juntos" type="email" name="email" id="email" placeholder="Informe o email">
                </label>
    
                <label class="juntos" for="cidade">
                    Cidade:
                    <input class="juntos" type="text" name="cidade" id="cidade" placeholder="Informe a cidade">
                </label>
    
                <label class="juntos" for="bairro">
                    Bairro:
                    <input class="juntos" type="text" name="bairro" id="bairro" placeholder="Informe o bairro">
                </label>
    
                <label class="juntos" for="rua">
                    Rua e número:
                    <input class="juntos" type="text" name="rua" id="rua" placeholder="Informe a rua (XXXXXXXX, 123)">
                </label>

                <div></div>
                <div class="button">
                    <button type="submit" class="enviar" name="enviar">Enviar</button>
                </div>
                
            </form> 

            </div>    

        </section>

    </main>

</body>
</html>