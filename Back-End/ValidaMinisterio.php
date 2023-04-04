<?php

include '../Back-End/Conecta.php';
include '../Back-End/Protetor.php';

$password = mysqli_real_escape_string($conexao, trim($_REQUEST['password']));
$minist   = $_REQUEST['btLog'];

$sql      = "SELECT * FROM tb_ministerios WHERE id_ministerio = '{$minist}'";
$volta    = mysqli_query($conexao, $sql);

if (mysqli_num_rows($volta) > 0) {

    $dados = mysqli_fetch_assoc($volta);

    if (password_verify($password, $dados['pw_ministerio'])) {
        
        $_SESSION['accessMinisterio'] = $minist;

        header('Location: ../Views/Ministerio.php');
        
    } else {
        
        echo '<script>
                alert("Senha incorreta!");
                window.location.href="../Views/Ministerio.php";
              </script>';

    }
    
}


?>