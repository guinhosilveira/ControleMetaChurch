<?php

include '../Back-End/Conecta.php';



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
    <link rel="stylesheet" href="../CSS/Tabelas.css">
    <link rel="stylesheet" href="../CSS/GruposMinisteriais.css">

    <title>Ministérios</title>
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
    

        <div class="title-wrapper">

            <h1>

                Ministérios MetaChurch

            </h1>

            <form action="../Back-End/GerarPlanilha.php" method="post">

                <button class="btDownload" name="min">
                    Baixar .XLS
                    <img 
                        src="../assets/download.svg" 
                        alt="Flecha apontando para baixo indicando possível download"
                    />
                </button>

            </form>

        </div>

        <table>

            <thead>

                <th> Ministério </th>
                <th> Líder </th>
                <th> Telefone do líder </th>
                <th> Saiba mais </th>

            </thead>

            <tbody>

                <?php

                    $sql   = "SELECT * FROM tb_ministerios"; 
                    $volta = mysqli_query($conexao, $sql);
                    $dados = mysqli_fetch_all($volta, MYSQLI_ASSOC);
                    
                    foreach ($dados as $key => $value) {
                        
                        $sql    = "SELECT * FROM tb_lider WHERE id_lider = '{$value['id_lider']}'"; 
                        $volta2 = mysqli_query($conexao, $sql);
                        $dados2 = mysqli_fetch_assoc($volta2);
                        $sql    = "SELECT * FROM tb_usuario WHERE id_user = '{$dados2['id_user']}'"; 
                        $volta3 = mysqli_query($conexao, $sql);
                        $dados3 = mysqli_fetch_assoc($volta3);
                        
                        echo '<tr>';
    
                            echo '<td>'. $value['nm_ministerio'] .'</td>';
                            echo '<td>'. $dados3['nm_user'] .'</td>';
                            echo '<td>'. $dados3['telefone'] .'</td>';
                            echo '<td>'; 
                                    echo '<form action="Ministerio.php" method="POST">';
                                        echo '<button type="submit" name="btMin" value="'. $value['id_ministerio'] .'">'; 
                                            echo 'Saiba mais';
                                        echo '</button>';
                                    echo '</form>';
                                '</td>';
                                
                        echo '</tr>';

                    }
                
                ?>

            </tbody>

        </table>

        <?php
            
            session_start();

            echo '<div class="button">';

                if (isset($_SESSION['adm'])) {
                
                    echo "<form action='CadastroMinisterial.php' method='POST'>";

                        echo "<button class='butCad' type='submit'>Cadastrar Ministério</button>";

                    echo "</form>";

                }

            echo '</div>';

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