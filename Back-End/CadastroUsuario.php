<?php

include 'Conecta.php';

if (isset($_REQUEST['enviar'])) {
    
    $nm_user = mysqli_real_escape_string($conexao, trim($_REQUEST['nome']));
    $email   = mysqli_real_escape_string($conexao, trim($_REQUEST['email']));
    
    $sql     = "SELECT * FROM tb_usuario WHERE email = '{$email}'";
    $volta   = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($volta) > 0) {

        echo "<script>
                alert('Email já cadastrado!');
                window.location.href = '../Views/Cadastro.php';
              </script>";
              
    } else {
                
        $sql   = "SELECT * FROM tb_membro WHERE email = '{$email}'";
        $volta = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($volta) > 0) {

            $dados    = mysqli_fetch_assoc($volta);
            $telefone = $dados['telefone'];
            $senha    = $dados['senha'];

            if(isset($_POST['admin'])) {
              
                $sql = "INSERT INTO tb_usuario (nm_user, email, telefone, senha, adm)
                        VALUES ('{$nm_user}', '{$email}', '{$telefone}', '{$senha}', 1)"; 
    
                if (mysqli_query($conexao, $sql)) {
                          
                    echo "<script>
                            alert('Cadastro realizado!');
                            window.location.href = '../Views/Index.php';
                          </script>";
                
                } else {
                
                    echo "<script>
                            alert('Erro ao realizar o cadastro!');
                            window.location.href = '../Views/Cadastro.php';
                          </script>";
    
                }

            } else {

                $sql = "INSERT INTO tb_usuario (nm_user, email, telefone, senha)
                        VALUES ('{$nm_user}', '{$email}', '{$telefone}', '{$senha}')"; 
    
                if (mysqli_query($conexao, $sql)) {
                          
                    echo "<script>
                            alert('Cadastro realizado!');
                            window.location.href = '../Views/Index.php';
                          </script>";
                
                } else {
                
                    echo "<script>
                            alert('Erro ao realizar o cadastro!');
                            window.location.href = '../Views/Cadastro.php';
                          </script>";
    
                }

            }

        }

    }

}

?>