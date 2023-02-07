<?php

include '../Back-End/Conecta.php';
include '../Back-End/Protetor.php';

$sql   = "SELECT * FROM tb_membro";
$volta = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_all($volta, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/Membros.css">
    
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

            Membros MetaChurch

        </h1>

        <table>

            <thead>

                <th> Nome </th>
                <th> Email </th>
                <th> Telefone </th>
                <th> Data de Nascimento </th>
                <th> Ano de Ingresso </th>
                <th> Rua </th>
                <th> Bairro </th>
                <th> Cidade </th>

            </thead>
            
            <tbody>

                <?php

                foreach ($dados as $key => $value) {
                    
                    echo '<tr>';

                        echo '<td>' .$value['nm_membro']. '</td>';
                        echo '<td>' .$value['email']. '</td>';
                        echo '<td>' .$value['telefone']. '</td>';
                        echo '<td>' .substr($value['dt_nasc'], 8, 10). '/' 
                                    .substr($value['dt_nasc'], 5, 2). '/' 
                                    .substr($value['dt_nasc'], 0, 4).  '</td>';
                        echo '<td>' .substr($value['ingresso'], 0, 4). '</td>';
                        echo '<td>' .$value['rua']. '</td>';
                        echo '<td>' .$value['bairro']. '</td>';
                        echo '<td>' .$value['cidade']. '</td>';

                    echo '</tr>';
                    
                };
            
                ?>

            </tbody>

        </table>

        <?php
            
            if (isset($_SESSION['adm'])) {
                
                echo "<form action='CadastroMembro.php' method='POST'>";

                    echo "<button class='butCad' type='submit'>Cadastrar Membro</button>";

                echo "</form>";

            }

        ?>

    </main>

    <footer>

        <div class="infos">

            Contato presidencial: (51) 98414-0809 <br>
            Instagram: <a href="https://www.instagram.com/meta.church/">@metachurch</a>
            
        </div>

    </footer>

</body>
</html>