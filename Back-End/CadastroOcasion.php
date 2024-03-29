<?php

include 'Conecta.php';
include 'Protetor.php';

if (isset($_REQUEST['enviar'])) {

    $nm_evento = mysqli_real_escape_string($conexao, trim($_REQUEST['nome']));
    $start    = mysqli_real_escape_string($conexao, trim($_REQUEST['start']));
    $end       = mysqli_real_escape_string($conexao, trim($_REQUEST['end']));
    $minist    = mysqli_real_escape_string($conexao, trim($_REQUEST['ministerio']));
    $tipo      = mysqli_real_escape_string($conexao, trim($_REQUEST['tipoEvento']));

    $sql       = "SELECT * FROM tb_ministerios WHERE id_ministerio = '{$minist}'";
    $volta     = mysqli_query($conexao, $sql);
    $dados     = mysqli_fetch_assoc($volta);

    switch ($tipo) {
        case 1:
            $color = '#008000';
            break;
        
        case 2:
            $color = '#FFA500';
            break;
        
        case 3:
            $color = '#FF0000';
            break;
        
        case 4:
            $color = '#800080';
            break;
        
        default:
            break;
    }

    $sql = "INSERT INTO tb_agenda (nm_ocasion, data_start, data_end, type_data, color) 
            VALUES ('{$nm_evento}', '{$start}', '{$end}', '{$tipo}', '{$color}')";

    if (mysqli_query($conexao, $sql)) {

        $sql = "SELECT MAX(id_agenda) FROM tb_agenda";

        if ($volta  = mysqli_query($conexao, $sql)) {
            
            $dados2 = mysqli_fetch_assoc($volta);
            foreach ($dados2 as $key => $value) {
                echo $value;
            }
        
            $sql   = "INSERT INTO tb_ocasion (id_data, id_lider)
                      VALUES ('{$dados2['MAX(id_agenda)']}', '{$dados['id_lider']}')";
            $volta = mysqli_query($conexao, $sql);

            echo '<script> 
                    alert("Cadastro realizado");
                    window.location.href = "../Views/Agenda.php"; 
                  </script>';
        
        } else {
            
            echo '<script> 
                    alert("Erro na ligação do evento");
                    window.location.href = "../Views/CadastroOcasion.php"; 
                  </script>';

        }


    } else {

        echo '<script> 
                alert("Erro na inserção do evento");
                window.location.href = "../Views/CadastroOcasion.php"; 
              </script>';
    
    }

} elseif (isset($_REQUEST['cancelar'])) {

    header("Location: ../Views/Agenda.php");

}

?>