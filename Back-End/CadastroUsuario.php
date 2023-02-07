<?php

include 'Conecta.php';

if (isset($_REQUEST['enviar'])) {
    
    $nm_user   = mysqli_real_escape_string($conexao, trim($_REQUEST['nome']));
    $email     = mysqli_real_escape_string($conexao, trim($_REQUEST['email']));
    $fone1     = mysqli_real_escape_string($conexao, trim($_REQUEST['fone1']));
    $fone2     = mysqli_real_escape_string($conexao, trim($_REQUEST['fone2']));

    $telefone  = $fone1 . $fone2;
    
    $senha     = mysqli_real_escape_string($conexao, trim($_REQUEST['senha']));
    $senhacrip = password_hash($senha, PASSWORD_DEFAULT);

    $sql       = "SELECT * FROM tb_usuario WHERE email = '{$email}'";
    $retorno   = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($retorno) > 0) {

        echo "<script>
                alert('Email já cadastrado!');
                window.location.href = '../Views/Cadastro.php';
              </script>";
              
            } else {
                
                $sql     = "INSERT INTO tb_usuario (nm_user, email, telefone, senha)
                            VALUES ('{$nm_user}', '{$email}', '{$telefone}', '{$senhacrip}')"; 
        
        if (mysqli_query($conexao, $sql)) {
            
            echo "<script>
                    alert('Cadastro realizado!');
                    window.location.href = '../Views/Login.php';
                  </script>";

        } else {
            
            echo "<script>
                    alert('Erro ao realizar o cadastro!');
                    window.location.href = '../Views/Cadastro.php';
                  </script>";

        }

    }

}

?>