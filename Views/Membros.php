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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700&family=Dosis:wght@500;700&family=Inter:wght@400;700&family=JetBrains+Mono:wght@500;700&family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/Membros.css">
    
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

        <div class="content">

            <div class="title-wrapper">
    
                <h1>
        
                    Membros MetaChurch
        
                </h1>
    
                <button class="btDownload">
                    Baixar .XLS
                    <img 
                        src="../assets/download.svg" 
                        alt="Flecha apontando para baixo indicando possível download"
                    />
                </button>
    
            </div>
    
            <table>
    
                <thead>
    
                    <th> Nome </th>
                    <th> Email </th>
                    <th> Telefone </th>
                    <th> Data de Nascimento </th>
                    <th> Ano de Ingresso </th>
                    <th> Endereço </th>
    
                </thead>
                
                <tbody>
    
                    <?php
    
                    foreach ($dados as $key => $value) {
                        
                        echo '<tr>';
    
                            echo '<td>' .$value['nm_membro']. '</td>';
                            echo '<td>' .$value['email']. '</td>';
                            echo '<td> (' .substr($value['telefone'], 0, 2). ') ' .substr($value['telefone'], 2, 5). '-' .substr($value['telefone'], 7, 4).'</td>';
                            echo '<td>' .substr($value['dt_nasc'], 8, 10). '/' 
                                        .substr($value['dt_nasc'], 5, 2). '/' 
                                        .substr($value['dt_nasc'], 0, 4).  '</td>';
                            echo '<td>' .substr($value['ingresso'], 0, 4). '</td>';
                            echo '<td> Rua ' .$value['rua']. ', ' .$value['bairro']. ', <br>' .$value['cidade']. '</td>';
    
                        echo '</tr>';
                        
                    };
                
                    ?>
    
                </tbody>
    
    
            </table>
            
            <?php
                                
                if (isset($_SESSION['adm'])) {
                        
                    echo '<div class="button">';
    
                        echo '<form action="./CadastroMembro.php" method="POST">';
    
                            echo '<button class="butCad" type="submit">Cadastrar Membro</button>';
    
                        echo '</form>';
                            
                    echo '</div>';
                }
    
            ?>

        </div>

    </main>

    <footer>

        <div class="infos">

            Contato presidencial: (51) 98414-0809 <br>
            Instagram: <a href="https://www.instagram.com/meta.church/">@metachurch</a>
            
        </div>

    </footer>

</body>
</html>