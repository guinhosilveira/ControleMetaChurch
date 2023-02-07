<?php

include '../Back-End/Conecta.php';

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/GruposMinisteriais.css">

    <title>Ministérios</title>
</head>
<body>
    <header>

        <a href="../Views/Agenda.php">Agenda</a>
        <a href="../Views/Membros.php">Membros</a>
        <a href="../Views/GruposMinisteriais.php">Ministérios</a>

    </header>

    <main>
    
        <h1>

            Ministérios MetaChurch

        </h1>

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

            if (isset($_SESSION['adm'])) {
                
                echo "<form action='CadastroMinisterial.php' method='POST'>";

                    echo "<button class='butCad' type='submit'>Cadastrar Ministério</button>";

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