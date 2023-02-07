<?php

include 'Conecta.php';

if (isset($_REQUEST['logar'])) {

    $email = mysqli_real_escape_string($conexao, trim($_REQUEST['email']));
    $senha = mysqli_real_escape_string($conexao, trim($_REQUEST['senha']));

    $sql   = "SELECT * FROM tb_usuario WHERE email = '{$email}'";
    $volta = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($volta);

    if (mysqli_num_rows($volta) == 1) {

        if (password_verify($senha, $dados['senha'])) {

            session_cache_expire(60);
            session_start();
            $_SESSION['id']       = $dados['id_user'];
            $_SESSION['nome']     = $dados['nm_user'];
            $_SESSION['email']    = $dados['email'];
            $_SESSION['senha']    = $dados['senha'];
            $_SESSION['telefone'] = $dados['telefone'];
            
            if ($dados['adm'] == 1) {
                $_SESSION['adm'] = $dados['adm'];
            }
            
            echo "<script>
                    alert('Login realizado!');
                    window.location.href = '../Views/CadastroMembro.php';
                  </script>";

        } else {
            
            echo "<script>
                    alert('Senha incorreta!');
                    window.location.href = '../Views/Login.php'; 
                  </script>";

        }

    } else {

        echo "<script>
                alert('Email inválido!');
                window.location.href = '../Views/Login.php'; 
              </script>";
    }
}

?>