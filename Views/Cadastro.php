<?php



?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;900&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Cadastro.css">
    <title>Administração MetaChurch</title>
</head>
<body>
    
    <header>

        <a href="../Views/Agenda.php">Agenda</a>
        <a href="../Views/Membros.php">Membros</a>
        <a href="../Views/GruposMinisteriais.php">Ministérios</a>
    
    </header>

    <main>

        <section class="formul">
        
            <form class="form" action="../Back-End/CadastroUsuario.php" method="POST">
                    
                <label class="juntos" for="idNome">
                    Nome completo:
                    <input type="text" name="nome" id="idNome" placeholder="Informe seu nome completo">
                </label>
                    
                <label class="juntos" for="idEmail">
                    Email:
                    <input type="email" name="email" id="idEmail" placeholder="Informe o email">
                </label>
                    
                <label class="juntos" for="idTel">
                    Número de telefone: 
                    <div class="fones">
                        <input class="juntos" type="tel" name="fone1" id="fone1" placeholder="Informe o DDD" required maxlength="2">
                        <input class="juntos" type="tel" name="fone2" id="fone2" placeholder="Informe o telefone" required maxlength="9">
                    </div>
                </label>
                    
                <label class="juntos" for="idSenha">
                    Senha:
                    <input type="password" name="senha" id="idSenha" placeholder="Informe a senha">
                </label>
                    
                <div class="buttons">
                    <button class="btCad" type="submit" name="enviar">Cadastrar</button>
                    <button class="btCan" type="reset" name="excluir">Excluir</button>
                </div>
            
            </form>
            
        </section>        

    </main>

    <footer>

        <div class="infos">

            Contato presidencial: (51) 98414-0809 <br>
            Instagram: <a href="https://www.instagram.com/meta.church/">@metachurch</a>
            
        </div>

    </footer>

</body>
</html>