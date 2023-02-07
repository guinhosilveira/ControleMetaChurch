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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/CadastroOcasion.css">

    <title>Cadastro de Evento</title>
</head>
<body>

    <header>

        <a href="../Views/Agenda.php">Agenda</a>
        <a href="../Views/Membros.php">Membros</a>
        <a href="../Views/GruposMinisteriais.php">Ministérios</a>

    </header>

    <main>

        
        <form action="../Back-End/CadastroOcasion.php" method="POST">

            <h1>
                Novo Evento
            </h1>
            
            <label class="juntos" for="nome">
                Nome do Evento:
                <input type="text" name="nome" id="nome" placeholder="Informe o nome do evento">
            </label>

            <label class="juntos" for="beggin">
                Início do Evento:
                <input type="datetime-local" name="beggin" id="beggin">
            </label>

            <label class="juntos" for="end">
                Fim do Evento:
                <input type="datetime-local" name="end" id="end">
            </label>

            <label class="juntos" for="select">
                Ministério:
                <select name="ministerio" id="select">

                    <?php

                        foreach ($dados as $key => $value) {

                            echo '<option value="'.$value['id_ministerio'].'">'.$value['nm_ministerio'].'</option>';

                        }

                    ?>
                    
                </select>
            </label>

            <div class="button">

                <button class="butCad" type="submit" name="cancelar">
                    Cancelar
                </button>

                <button class="butCad" type="submit" name="enviar">
                    Confirmar Evento
                </button>                

            </div>

        </form>

    </main>

    <footer>



    </footer>

</body>
</html>