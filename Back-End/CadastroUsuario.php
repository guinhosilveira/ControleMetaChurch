<?php

include 'Conecta.php';

if (isset($_REQUEST['enviar'])) {

    $condition = isset($_POST['admin']) && isset($_POST['dir']);

    if (!$condition) {
        
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
    
                $dados     = mysqli_fetch_assoc($volta);
                $id_membro = $dados['id_membro'];
                $telefone  = $dados['telefone'];
                $senha     = $dados['senha'];
                $type;
    
                if (isset($_POST['admin'])) {
                    $type = 1;
                } elseif (isset($_POST['dir'])) {
                    $type = 2;
                } else {
                    $type = null;
                }
    
                $sql = "INSERT INTO tb_usuario (nm_user, email, telefone, senha, id_membro, type_user)
                        VALUES ('{$nm_user}', '{$email}', '{$telefone}', '{$senha}', '{$id_membro}', '{$type}')"; 
        
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

    } else {

        echo "<script>
                alert('Não é possível cadastrar um usuário como administrador e como membro da direção!');
                window.location.href = '../Views/Cadastro.php';
              </script>";

    }

}

?>